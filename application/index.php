<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: ../auth/');
    exit;
}

$title = 'Подача заявления';
include '../inc/header.php';
?>

<h2 class="text-center mb-4">Подача заявления</h2>

<form action="/demo/admin/controllers/add_application.php" method="post" class="m-auto" style="max-width: 400px;">
    <div class="mb-3">
        <label for="number_car" class="form-label fs-5">Государственный регистрационный номер автомобиля</label>
        <input type="text" class="form-control shadow-sm p-3 rounded-pill" id="number_car" name="number_car">
    </div>
    <div class="mb-3">
        <label for="message" class="form-label fs-5">Описание нарушения</label>
        <textarea class="form-control shadow-sm p-3 rounded-pill" id="message" name="message" rows="4"></textarea>
    </div>
    <input type="submit" class="btn btn-success mb-3 mt-3 w-100 shadow-sm p-3 fs-2 rounded-pill fw-bold" value="Подать заявление">
</form>

<?php include '../inc/footer.php'; ?>