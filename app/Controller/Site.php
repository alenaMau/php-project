<?php

namespace Controller;

use Model\User;
use Src\View;
use Src\Request;
use Src\Auth\Auth;

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

     public function home(): string
     {
          $this->checkAccess();
          return new View('site.home');
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

     public function abonent(): string
     {
          $this->checkAccess();
          return new View('site.abonent');
     }

     public function rooms(): string
     {
          $this->checkAccess();
          return new View('site.rooms');
     }

     public function subdivision(): string
     {    
          $this->checkAccess();
          return new View('site.subdivision');
     }
     public function phone(): string
     {
          $this->checkAccess();
          return new View('site.phone');
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
                    ;
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


