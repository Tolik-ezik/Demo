<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$connect = new mysqli("localhost", "root", "qazmlp123", "demo2");

if($connect->connect_error){
echo "Ошибка подключения к базе данных";
};
