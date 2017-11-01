<?php

include 'vendor/autoload.php';

$exampleInput = ['email' => 'fakeheal@gmail.com', 'age' => 11, 'username' => 'test', 'type' => 'administrator'];

$validator = new \Core\Validation\Validator($exampleInput, [
    'email' => 'required|email',
    'age' => 'required|numeric|min:10',
    'username' => 'min:3',
    'type' =>'massive|in:client,administrator,moderator'
]);

if($validator->validate()) {
    echo 'valid';
} else {
  dd($validator->getErrors());
}