<?php
session_start();
include '../../function/connect.php';

if (!isset($_SESSION['login'])) {
    header('Location: ../../auth/');
    exit;
}

$number_car = $_POST['number_car'];
$message = $_POST['message'];

$sql = "SELECT id FROM users WHERE login = '".$_SESSION['login']."'";
$result = mysqli_query($connect, $sql);
$user = mysqli_fetch_assoc($result);
$user_id = $user['id'];

$number = rand(100000, 999999);

$sql = "INSERT INTO applications (id, number_car, message, user_id, id_status) 
        VALUES ('$number', '$number_car', '$message', '$user_id', 1)";
mysqli_query($connect, $sql);

header('Location: ../../profile/');
?>