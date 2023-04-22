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

function errorLog(string $messageText) : void
{
    $log = date('Y-m-d H:i:s') . " " . $messageText;
    $log = str_replace("\n", " ", $log);
    file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
    echo $messageText;
    exit;
}

$findMe = "@";
$pos = strpos($email, $findMe);
if ($pos === false) {
    errorLog("Неправильный email\n");
}
if (!$password) {
    errorLog("Пароль не введен\n");
}
if ($password !== $repeatPassword) {
    errorLog("Пароли не совпадают\n");
}
foreach ($usersData as $user) {
    if ($user["email"] === $email) {
        errorLog("email уже зарегестрирован\n");
    }
}
errorLog("success");