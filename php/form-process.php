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
    "invalidPassword"    => "Пароли не совпадают\n",
    "emailAlreadyExists" => "email уже зарегестрирован\n"
];

$email          = $_POST["email"];
$password       = $_POST["password"];
$repeatPassword = $_POST["repeatPassword"];

$error = "";

//check email for @
$findMe = "@";
$pos = strpos($email, $findMe);
if ($pos === false) {
    $error = $errors["invalidEmail"];
} elseif ($password !== $repeatPassword) { //check repeatPassword
    $error = $errors["invalidPassword"];
} else {
    foreach ($usersData as $user) {
        if ($user["email"] === $email) { //check email
            $error = $errors["emailAlreadyExists"];
        }
    }
}

$log = date('Y-m-d H:i:s') . " " . ($error ?: "Успешная регистрация");
$log = str_replace("\n", " ", $log);
file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);

echo $error;
