<?php

namespace Controller;

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

class Site
{
     // public function index(Request $request): string
     // {
     //      return(new View())->render('site.post');
     // }

     // public function hello(): string
     // {
     //      return new View('site.hello', ['message' => 'hello working']);
     // }

     public function home(Request $request): string
     {
          $this->checkAccess();
          if($request->method ==='POST') {
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
          $abonents = Abonent::all();
          $subdivisions = Subdivision::all(); 
          return new View('site.home',['abonents' => $abonents,'subdivisions' => $subdivisions]);
     }

     public function login(Request $request): string
     {
          if ($request->method === 'GET') {
               return new View('site.login');
          }
          if (Auth::attempt($request->all())) {
               if (Auth::user()->id_rol === 1) {
                    app()->route->redirect('manager');
               } else {
                    app()->route->redirect('home');
               }
          }
          return new View('site.login', ['message' => 'Неправильные логин или пароль']);
     }

     public function logout(): void
     {
          Auth::logout();
          app()->route->redirect('login');
     }

     public function rooms(Request $request): string
     {
          $this->checkAccess();

          if ($request->method === 'POST') {
               $name = $request->get('name');
               $type_of_room = $request->get('type_of_room');
               $id_subdivision = $request->get('id_subdivision');
               if (empty($name) || empty($type_of_room || empty($id_subdivision))) {
                    ['message' => 'Пустые поля'];
               }
               $model = new Room();
               $model->name = $name;
               $model->id_type_of_room = $type_of_room;
               $model->id_subdivision = $id_subdivision;
               if ($model->save()) {
                    return new View('site.rooms', ['message' => 'Успешно добавленно']);
                    
               }
          }
          $type_of_room = Type_of_room::all();
          $subdivisions = Subdivision::all();     
          return new View('site.rooms',['subdivisions' => $subdivisions,'type_of_room' => $type_of_room]);
     }

     public function abonent(Request $request): string
     {
          $this->checkAccess();
          if ($request->method === 'POST') {
               $name = $request->get('name');
               $surname = $request->get('surname');
               $patronymic = $request->get('patronymic');
               $date_of_birth = $request->get('date_of_birth');
               $id_subdivision = $request->get('id_subdivision');
               if (empty($name) || empty($surname || empty($patronymic) || empty($date_of_birth) || empty($id_subdivision))) {
                    ['message' => 'Пустые поля'];
               }
               $model = new Abonent();
               $model->name = $name;
               $model->surname = $surname;
               $model->patronymic = $patronymic;
               $model->date_of_birth = $date_of_birth;
               $model->id_subdivision = $id_subdivision;
               if ($model->save()) {
                    return new View('site.abonent', ['message' => 'Успешно добавленно']);
                    
               } else {
                    ['message' => ',бля'];
               }
          }
          $subdivisions = Subdivision::all();     
          return new View('site.abonent',['subdivisions' => $subdivisions]);
     }

     public function subdivision(Request $request): string
     {    
          $this->checkAccess();
          if ($request->method === 'POST') {
               $name = $request->get('name');
               $type_of_unit = $request->get('type_of_unit');
               if (empty($name) || empty($type_of_unit)) {
                    ['message' => 'Пустые поля'];
               }
               $model = new Subdivision();
               $model->name = $name;
               $model->id_type_of_unit = $type_of_unit;
               if ($model->save()) {
                    return new View('site.subdivision', ['message' => 'Успешно добавленно']);
                    
               }
          }
          $type_of_unit = Type_of_unit::all();
          return new View('site.subdivision');
     }     


     public function phone(Request $request): string
     {
          $this->checkAccess();
          if ($request->method === 'POST') {
               $telNumber = $request->get('number_telephone');
               $room = $request->get('room');
               $subdivision = $request->get('subdivision');
               if (empty($room) || empty($telNumber || empty($subdivision))) {
                    ['message' => 'Пустые поля'];
               }
               $model = new Telephone();
               $model->number_telephone = $telNumber;
               $model->id_room = $room;
               $model->id_subdivision = $subdivision;
               if ($model->save()) {
                    return new View('site.phone', ['message' => 'Успешно добавленно']);
                    
               }
          }
          $subdivisions = Subdivision::all();
          $rooms = Room::all();
          return new View('site.phone', ['subdivisions' => $subdivisions, 'rooms' => $rooms]);
     }

     public function manager(): string
     {    
          $this->checkAccess(true);

          return new View('site.manager');
     }

     public function manager_form(Request $request): string
     {
          $this->checkAccess(true);
          if ($request->method === 'POST') {
               $email = $request->get('email');
               $password = $request->get('password');
               if (empty($email) || empty($password)) {
                    die(['message' => 'Пустые поля']);
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


