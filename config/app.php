<?php
use Middlewares\AuthMiddleware;
use Middlewares\CSRFMiddleware;
use Validator\ConcrectValodators\UniqueValidator;
use Validator\metog\NumberValidator;
use Validator\metog\RequireValidator;
return [
   'auth' => \Src\Auth\Auth::class,

   'identity' => \Model\User::class,

   'validators' => [
      'required' => RequireValidator::class,
      'unique' => UniqueValidator::class,
      'number' => NumberValidator::class,
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
