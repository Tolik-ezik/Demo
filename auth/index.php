<?php
session_start();

if (isset($_SESSION['login'])) {
    header('Location: ../profile/');
    exit;
}

$title = 'Авторизация';
include '../inc/header.php';

$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<h2 class="text-center mb-4">Авторизация</h2>

<?php if ($message): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<main class="flex-grow-1 d-flex align-items-center justify-content-center py-5">
    <form action="/demo/admin/controllers/login.php" method="post" class="w-100 px-3" style="max-width: 400px;">
        <div class="mb-3">
            <label for="login" class="form-label fs-5">Логин</label>
            <input type="text" class="form-control shadow-sm p-3 rounded-pill" id="login" name="login">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fs-5">Пароль</label>
            <input type="password" class="form-control shadow-sm p-3 rounded-pill" id="password" name="password">
        </div>

        <input type="submit" class="btn btn-success mb-3 mt-3 w-100 shadow-sm p-3 fs-2 rounded-pill fw-bold" value="Войти">
    </form>
</main>

<?php include '../inc/footer.php'; ?>