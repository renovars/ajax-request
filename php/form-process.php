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

$email          = $_POST["email"];
$password       = $_POST["password"];
$repeatPassword = $_POST["repeatPassword"];

ob_start();

//check email for @
$findMe = "@";
$pos = strpos($email, $findMe);
if ($pos === false) {
    echo "Неправильный email\n";
}
//check repeatPassword
if ($password !== $repeatPassword) {
    echo "Пароли не совпадают\n";
}
//check email
foreach ($usersData as $user) {
    if ($user["email"] === $email) {
        echo "email уже зарегестрирован\n";
    }
}

$log = date('Y-m-d H:i:s') . " " . (ob_get_contents() ?: "Успешная регистрация");
$log = str_replace("\n", " ", $log);
file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);

ob_end_flush();

