<?php
session_start();
include '../../function/connect.php';

$login = $_POST['login'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['login'] = $user['login'];
    $_SESSION['id_role'] = $user['id_role'];  // ← ключ id_role
    header('Location: ../../profile/');
} else {
    $_SESSION['message'] = 'Некорректный логин или пароль';
    header('Location: ../../auth/');
}
?>