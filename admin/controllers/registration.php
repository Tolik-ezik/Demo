<?php
session_start();
include '../../function/connect.php';

$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = $_POST['patronymic'];
$login = $_POST['login'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$sql = "INSERT INTO users (surname, name, patronymic, login, email, phone, password, id_role) 
        VALUES ('$surname', '$name', '$patronymic', '$login', '$email', '$phone', '$password', 2)";
mysqli_query($connect, $sql);

$_SESSION['login'] = $login;
$_SESSION['role'] = 'user';
header('Location: ../../profile/');
?>