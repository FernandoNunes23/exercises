<?php
require_once("Validator/FormValidator.php");
require_once("Helper/FileHelper.php");

$name = $_POST['name'];
$secondName = $_POST['second_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$login = $_POST['login'];
$password = $_POST['password'];

try {
	FormValidator::validate($name, $secondName, $email, $phone, $login, $password);
	FileHelper::addRow($name, $secondName, $email, $phone, $login, $password);
} catch (\Exception $exception) {
	echo $exception->getMessage();
	die();
}

header("Location: http://localhost:8080/exercicio4/form.html");
die();