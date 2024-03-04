<?php
return [
   'auth' => \Src\Auth\Auth::class,

   'identity'=>\Model\User::class,

   'validators' => [
      'required' => \Validators\RequireValidator::class,
      'unique' => \Validators\UniqueValidator::class
  ]
];
