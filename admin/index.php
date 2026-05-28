<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['id_role'] != '1') {
    header('Location: ../auth/');
    exit;
}

$title = 'Админ Панель';
include '../inc/header.php';
include '../function/function.php';
?>

<h2 class="text-center mb-4">Админ Панель</h2>

<div class="cards">
    <?php echo fnGetCardAdmin(); ?>
</div>

<?php include '../inc/footer.php'; ?>