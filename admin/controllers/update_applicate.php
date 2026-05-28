<?php
session_start();
include '../../function/connect.php';

if (!isset($_SESSION['login']) || $_SESSION['id_role'] != '1') {
    header('Location: ../auth/');
    exit;
}

$id = $_GET['id'];
$action = $_GET['action'];

$status = '1';
if ($action == 'success') {
    $status = '2';
} elseif ($action == 'cancel') {
    $status = '3';
}

$sql = "UPDATE applications SET id_status  = '$status' WHERE id = '$id'";
mysqli_query($connect, $sql);

header('Location: ../../admin/');
?>