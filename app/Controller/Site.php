<?php

namespace Controller;

use Illuminate\Database\Query\Expression;
use Model\Room;
use Model\Type_of_room;
use Model\Subdivision;
use Model\Abonent;
use Model\User;
use Model\Telephone;
use Src\View;
use Src\Request;
use Src\Auth\Auth;
use Model\Type_of_unit;
use Model\AbonentTelepnone;
use Throwable;
use Src\Validator\Validator;
use Illuminate\Support\Facades\DB;

class Site
{
     public function home(Request $request): string
     {
          $this->checkAccess();
          return new View('site.home');
     }

     public function attach_number(Request $request): string
     {
          $this->checkAccess();
          $telephones = Telephone::all();
          $abonents = Abonent::all();
          if ($request->method === 'POST') {
               try {
                    $abonent = $request->get('abonent');
                    $id_telephone = $request->get('telephone');
                    if (empty($abonent) || empty($id_telephone)) {
                         ['message' => 'Пустые поля'];
                    }
                    $model = new AbonentTelepnone();
                    $model->id_abonent = $abonent;
                    $model->id_telephone = $id_telephone;
                    $model->save();
                    return new View('site.attach_number', ['message' => 'Успешно добавленно', 'telephones' => $telephones, 'abonents' => $abonents]);

               } catch (Throwable $e) {
                    return new View('site.attach_number', ['message' => 'Такой пользователь уже имеет такой номер', 'telephones' => $telephones, 'abonents' => $abonents]);
               }
          }
          return new View('site.attach_number', ['telephones' => $telephones, 'abonents' => $abonents]);
     }

     public function login(Request $request): string
     {
          if ($request->method === 'POST') {
               $validator = new Validator($request->all(), [
                    'email' => ['required'],
                    'password' => ['required'],
               ], [
                    'required' => 'Поле :field пусто',
               ]);

               if ($validator->fails()) {
                    return new View('site.login', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
               }

               if (Auth::attempt($request->all())) {
                    if (Auth::user()->id_rol === 1) {
                         app()->route->redirect('manager');
                    } else {
                         app()->route->redirect('home');
                    }
                    return new View('site.login', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
               }
          }
          return new View('site.login');
     }

     public function logout(): void
     {
          Auth::logout();
          app()->route->redirect('login');
     }

     public function rooms(Request $request): string
     {
          $this->checkAccess();
          $type_of_rooms = Type_of_room::all();
          $subdivisions = Subdivision::all();

          if ($request->method === 'POST') {
               $validator = new Validator($request->all(), [
                    'name' => ['required'],
                    'type_of_room' => ['required'],
                    'id_subdivision' => ['required'],
                    'file' => ['required'],
               ], [
                    'required' => 'Поле :field пусто',
               ]);

               if ($validator->fails()) {
                    return new View('site.rooms', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'subdivisions' => $subdivisions, 'type_of_rooms' => $type_of_rooms]);
               }
               $name = $request->get('name');
               $type_of_room = $request->get('type_of_room');
               $id_subdivision = $request->get('id_subdivision');

               $uploadDirectory = 'images/';
               if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                    $file = $_FILES['file'];
                    $filename = $uploadDirectory . basename($file['name']);
                    if (!move_uploaded_file($file['tmp_name'], $filename)) {
                         return new View('site.rooms', ['message' => 'Не удалось загрузить файл', 'subdivisions' => $subdivisions, 'type_of_rooms' => $type_of_rooms]);
                    }
               }

               $model = new Room();
               $model->name = $name;
               $model->id_type_of_room = $type_of_room;
               $model->id_subdivision = $id_subdivision;
               $model->image = $filename;
               if ($model->save()) {
                    return new View('site.rooms', ['message' => 'Успешно добавленно', 'subdivisions' => $subdivisions, 'type_of_rooms' => $type_of_rooms]);

               }
          }
          return new View('site.rooms', ['subdivisions' => $subdivisions, 'type_of_rooms' => $type_of_rooms]);
     }

     public function abonent(Request $request): string
     {
          $this->checkAccess();
          $subdivisions = Subdivision::all();
          if ($request->method === 'POST') {
               $validator = new Validator($request->all(), [
                    'name' => ['required'],
                    'surname' => ['required'],
                    'patronymic' => ['required'],
                    'date_of_birth' => ['required'],
                    'id_subdivision' => ['required'],
               ], [
                    'required' => 'Поле :field пусто',
               ]);

               if ($validator->fails()) {
                    return new View('site.abonent', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'subdivisions' => $subdivisions]);
               }
               $name = $request->get('name');
               $surname = $request->get('surname');
               $patronymic = $request->get('patronymic');
               $date_of_birth = $request->get('date_of_birth');
               $id_subdivision = $request->get('id_subdivision');
               $model = new Abonent();
               $model->name = $name;
               $model->surname = $surname;
               $model->patronymic = $patronymic;
               $model->date_of_birth = $date_of_birth;
               $model->id_subdivision = $id_subdivision;
               if ($model->save()) {
                    return new View('site.abonent', ['message' => 'Успешно добавленно', 'subdivisions' => $subdivisions]);

               } else {
                    ['message' => ''];
               }
          }
          return new View('site.abonent', ['subdivisions' => $subdivisions]);
     }

     public function abonent_all(Request $request): string
     {
          $this->checkAccess();
          $exp = new Expression('subdivision.name, count(*) as total');
          $countAbonentSubdivision = Abonent::query()
               ->select($exp)
               ->join('subdivision', 'id_subdivision', '=', 'subdivision.id')
               ->groupBy(['subdivision.name'])
               ->get();

          $expTwo = new Expression('room.name, count(*) as total');
          $countAbonentRoom = Abonent::query()
               ->select($expTwo)
               ->join('room', 'room.id_subdivision', '=', 'subscriber.id_subdivision')
               ->groupBy(['room.name'])
               ->get();

          $abonents = Abonent::all();
          $type_of_units = Type_of_unit::all();
          return new View('site.abonent_all', ['abonents' => $abonents, 'subdivisions' => $countAbonentSubdivision, 'rooms' => $countAbonentRoom, 'type_of_units' => $type_of_units]);
     }


     public function abonent_list(Request $request): string
     {
          $this->checkAccess();

          $abonents = AbonentTelepnone::all();
          return new View('site.abonent_list', ['abonents' => $abonents]);
     }

     public function subdivision(Request $request): string
     {

          $this->checkAccess();
          $abonents = Abonent::all();
          $type_of_units = Type_of_unit::all();

          if ($request->method === 'POST') {

               $validator = new Validator($request->all(), [
                    'name' => ['required'],
                    'type_of_unit' => ['required'],
               ], [
                    'required' => 'Поле :field пусто',
               ]);

               if ($validator->fails()) {
                    return new View('site.subdivision', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'abonents' => $abonents, 'type_of_units' => $type_of_units]);
               }
               $name = $request->get('name');
               $type_of_unit = $request->get('type_of_unit');
               $model = new Subdivision();
               $model->name = $name;
               $model->id_type_of_unit = $type_of_unit;
               if ($model->save()) {
                    return new View('site.subdivision', ['message' => 'Успешно добавленно', 'abonents' => $abonents, 'type_of_units' => $type_of_units]);
               }
          }

          if ($request->method === 'POST') {
               $name = $request->get('name');
               $surname = $request->get('surname');
               $patronymic = $request->get('patronymic');
               $date_of_birth = $request->get('date_of_birth');
               $id_subdivision = $request->get('id_subdivision');
               $model = new Abonent();
               $model->name = $name;
               $model->surname = $surname;
               $model->patronymic = $patronymic;
               $model->date_of_birth = $date_of_birth;
               $model->id_subdivision = $id_subdivision;
          } else {
               ['message' => 'нету'];
          }
          return new View('site.subdivision', ['abonents' => $abonents, 'type_of_units' => $type_of_units]);
     }


     public function phone(Request $request): string
     {
          $this->checkAccess();
          $subdivisions = Subdivision::all();
          $rooms = Room::all();

          if ($request->method === 'POST') {
               $validator = new Validator($request->all(), [
                    'number_telephone' => ['required', 'number'],
                    'room' => ['required'],
                    'subdivision' => ['required'],
               ], [
                    'required' => 'Поле :field пусто',
                    'number' => 'Поле :field только номераа',
               ]);

               if ($validator->fails()) {
                    return new View('site.phone', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'subdivisions' => $subdivisions, 'rooms' => $rooms]);
               }
               $telNumber = $request->get('number_telephone');
               $room = $request->get('room');
               $subdivision = $request->get('subdivision');
               $model = new Telephone();
               $model->number_telephone = $telNumber;
               $model->id_room = $room;
               $model->id_subdivision = $subdivision;
               if ($model->save()) {
                    return new View('site.phone', ['message' => 'Успешно добавленно', 'subdivisions' => $subdivisions, 'rooms' => $rooms]);

               }
          }
          return new View('site.phone', ['subdivisions' => $subdivisions, 'rooms' => $rooms]);
     }

     public function manager(): string
     {
          $this->checkAccess(true);

          return new View('site.manager');
     }

     public function search(): string
     {
          $this->checkAccess(true);

          $searchName = $_POST['abonent'] ?? '';
          if (!empty($searchName)) {
               $searchName = $searchName[0];
               $abonents = Abonent::where('name', 'LIKE', "%$searchName%")->orWhere('surname', 'LIKE', "%$searchName%")->orWhere('patronymic', 'LIKE', "%$searchName%")->get();
          } else {
               $abonents = Abonent::all();
          }

          return new View('site.search', ['abonents' => $abonents]);
     }

     public function manager_form(Request $request): string
     {
          $this->checkAccess(true);

          if ($request->method === 'POST') {
               $validator = new Validator($request->all(), [
                    'email' => ['required'],
                    'password' => ['required'],
               ], [
                    'required' => 'Поле :field пусто',
               ]);
               $email = $request->get('email');
               $password = $request->get('password');

               if ($validator->fails()) {
                    return new View('site.phone', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
               }
               $model = new User();
               $model->email = $email;
               $model->password = md5($password);
               $model->id_rol = 2;
               if ($model->save()) {
                    return new View('site.home', ['message' => 'Неправильные логин или пароль']);

               }
          }
          return new View('site.manager_form');
     }

 

     public function room_all(Request $request): string
     {
          $this->checkAccess(true);
          $rooms = Room::all();

          return new View('site.room_all',['rooms' => $rooms,]);
     }

     private function checkAccess(bool $isCheckModerator = false): void
     {
          $auth = app()->auth;
          if (!$auth->check()) {
               app()->route->redirect('login');
          }
          if ($isCheckModerator && $auth->user()->id_rol === 2) {
               app()->route->redirect('home');
          }
     }
}


