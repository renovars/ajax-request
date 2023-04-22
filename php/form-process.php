<?php

//Users registration data
$usersData = [
    [
        "id"    => 0,
        "email" => "novars@gmail.com",
        "name"  => "Arseniy",
    ],
    [
        "id"    => 1,
        "email" => "summer@mail.ru",
        "name"  => "Andrey",
    ],
    [
        "id"    => 2,
        "email" => "winter@mail.ru",
        "name"  => "Boris",
    ],
];

//Errors
$errors = [
    "invalidEmail"       => "Неправильный email\n",
    "passwordIsEmpty"    => "Пароль не введен\n",
    "invalidPassword"    => "Пароли не совпадают\n",
    "emailAlreadyExists" => "email уже зарегестрирован\n"
];

$email          = $_POST["email"];
$password       = $_POST["password"];
$repeatPassword = $_POST["repeatPassword"];

try {
    //check email for @
    $findMe = "@";
    $pos = strpos($email, $findMe);
    if ($pos === false) {
        throw new Exception($errors["invalidEmail"]);
    }
    if (!$password) {
        throw new Exception($errors["passwordIsEmpty"]);
    }
    if ($password !== $repeatPassword) { //check repeatPassword
        throw new Exception($errors["invalidPassword"]);
    }
    foreach ($usersData as $user) {
        if ($user["email"] === $email) { //check email
            throw new Exception($errors["emailAlreadyExists"]);
        }
    }
    $log = date('Y-m-d H:i:s') . " " . "Успешная регистрация";
    file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
    echo "success";

} catch (Exception $e) {
    $log = date('Y-m-d H:i:s') . " " . $e->getMessage();
    $log = str_replace("\n", " ", $log);
    file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
    echo $e->getMessage();
}