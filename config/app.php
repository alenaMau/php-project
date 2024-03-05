<?php
use Middlewares\AuthMiddleware;
use Middlewares\CSRFMiddleware;
return [
   'auth' => \Src\Auth\Auth::class,

   'identity' => \Model\User::class,

   'validators' => [
      'required' => \Validators\RequireValidator::class,
      'unique' => \Validators\UniqueValidator::class,
      'number' => \Validators\NumberValidator::class,
   ],

   'routeMiddleware' => [
      'auth' => AuthMiddleware::class,
   ],

   'routeAppMiddleware' => [
      'csrf' => CSRFMiddleware::class,
      'trim' => \Middlewares\TrimMiddleware::class,
      'specialChars' => \Middlewares\SpecialCharsMiddleware::class,
   ],
];
