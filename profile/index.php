<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../auth/');
    exit;
}

$title = 'Личный кабинет';
include '../inc/header.php';
include '../function/function.php';
?>

<h2 class="text-center mb-4">Личный кабинет</h2>

<?php echo fnGetProfile($_SESSION['login']); ?>

<div class="text-center mt-4 mb-4">
    <a href="../application/" class="btn btn-success w-100 shadow-sm p-3 fs-2 rounded-pill fw-bold">Подать заявление</a>
</div>

<div class="cards">
    <?php echo fnGetCardProfile($_SESSION['login']); ?>
</div>

<?php include '../inc/footer.php'; ?>