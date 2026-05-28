<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$menu = '';

if (isset($_SESSION['login'])) {
    $menu .= '<li class="nav-item"><a class="nav-link" href="/demo/profile/">Личный кабинет</a></li>';

    if (isset($_SESSION['id_role']) && (int)$_SESSION['id_role'] === 1) {
        $menu .= '<li class="nav-item"><a class="nav-link" href="/demo/admin/">Админ Панель</a></li>';
    }

    $menu .= '<li class="nav-item"><a class="nav-link" href="/demo/admin/controllers/logout.php">Выйти</a></li>';
} else {
    $menu .= '<li class="nav-item"><a class="nav-link" href="/demo/auth/">Вход</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="/demo/register/">Регистрация</a></li>';
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Нарушениям.Нет'; ?></title>
    <link rel="stylesheet" href="/demo/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/demo/assets/style/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/demo/">
                <img src="/demo/assets/img/logo.png" alt="Нарушениям.Нет" height="40" class="me-2">
                Нарушениям.Нет
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php echo $menu; ?>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-4">