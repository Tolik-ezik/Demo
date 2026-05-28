<?php
include 'connect.php';

function fnGetProfile($login)
{
    global $connect;
    $sql = "SELECT surname, name, patronymic, phone FROM users WHERE login = '$login'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    $data = '
    <p class="fs-5"><span class="fw-semibold">Фамилия:</span> ' . $row['surname'] . '</p>
    <p class="fs-5"><span class="fw-semibold">Имя:</span> ' . $row['name'] . '</p>
    <p class="fs-5"><span class="fw-semibold">Отчество:</span> ' . $row['patronymic'] . '</p>
    <p class="fs-5"><span class="fw-semibold">Телефон:</span> ' . $row['phone'] . '</p>';

    return $data;
}

function fnGetCardProfile($login)
{
    global $connect;
    $sql = "SELECT id FROM users WHERE login = '$login'";
    $result = mysqli_query($connect, $sql);
    $user = mysqli_fetch_assoc($result);
    $user_id = $user['id'];

    $sql = "SELECT * FROM applications WHERE user_id = '$user_id'";
    $result = mysqli_query($connect, $sql);

    $data = '';
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['id_status'] == 3) {
            $data .= sprintf('
            <div class="card w-100 mb-3 mt-3 text-muted">
                <div class="card-body">
                    <h5 class="card-title">Нарушение №%s</h5>
                    <p class="mb-1"><span class="fw-semibold">Статус:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Гос номер авто:</span> %s</p>
                    <p class="card-text">%s</p>
                </div>
            </div>', $row['id'], $row['id_status'] = "Отменено", $row['number_car'], $row['message']);
        } elseif ($row['id_status'] == 2) {
            $data .= sprintf('
            <div class="card w-100 mb-3 mt-3 text-success">
                <div class="card-body">
                    <h5 class="card-title">Нарушение №%s</h5>
                    <p class="mb-1"><span class="fw-semibold">Статус:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Гос номер авто:</span> %s</p>
                    <p class="card-text">%s</p>
                </div>
            </div>', $row['id'], $row['id_status'] = "Подтверждено", $row['number_car'], $row['message']);
        } else {
            $row['id_status'] = "Новое";
            $data .= sprintf('
            <div class="card w-100 mb-3 mt-3">
                <div class="card-body">
                    <h5 class="card-title">Нарушение №%s</h5>
                    <p class="mb-1"><span class="fw-semibold">Статус:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Гос номер авто:</span> %s</p>
                    <p class="card-text">%s</p>
                </div>
            </div>', $row['id'], $row['id_status'] = "Новое", $row['number_car'], $row['message']);
        }
    }

    return $data;
}

function fnGetCardAdmin()
{
    global $connect;
    $sql = "SELECT applications.*, users.surname, users.name, users.patronymic 
            FROM applications 
            JOIN users ON applications.user_id = users.id";
    $result = mysqli_query($connect, $sql);

    $data = '';
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['id_status'] == 3) {
            $data .= sprintf('
            <div class="card w-100 mb-3 mt-3 text-muted">
                <div class="card-body">
                    <h5 class="card-title">Нарушение №%s</h5>
                    <p class="mb-1"><span class="fw-semibold">Фамилия:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Имя:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Отчество:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Статус:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Гос номер авто:</span> %s</p>
                    <p class="card-text">%s</p>
                </div>
            </div>', $row['id'], $row['surname'], $row['name'], $row['patronymic'], $row['id_status'] = "Отменено", $row['number_car'], $row['message']);
        } elseif ($row['id_status'] == '2') {
            $data .= sprintf('
            <div class="card w-100 mb-3 mt-3 text-success">
                <div class="card-body">
                    <h5 class="card-title">Нарушение №%s</h5>
                    <p class="mb-1"><span class="fw-semibold">Фамилия:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Имя:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Отчество:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Статус:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Гос номер авто:</span> %s</p>
                    <p class="card-text">%s</p>
                </div>
            </div>', $row['id'], $row['surname'], $row['name'], $row['patronymic'], $row['id_status']="Подтверждено", $row['number_car'], $row['message']);
        } else {
            $data .= sprintf('
            <div class="card w-100 mb-3 mt-3">
                <div class="card-body">
                    <h5 class="card-title">Нарушение №%s</h5>
                    <p class="mb-1"><span class="fw-semibold">Фамилия:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Имя:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Отчество:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Статус:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Гос номер авто:</span> %s</p>
                    <p class="card-text">%s</p>
                    <a href="/demo/admin/controllers/update_applicate.php?id=%s&action=success" class="btn btn-success w-100 mb-2">Подтвердить</a>
                    <a href="/demo/admin/controllers/update_applicate.php?id=%s&action=cancel" class="btn btn-outline-success border border-success m-0 w-100">Отменить</a>
                </div>
            </div>', $row['id'], $row['surname'], $row['name'], $row['patronymic'], $row['id_status']="Новое", $row['number_car'], $row['message'],$row['id'],$row['id'] );
        }
    }

    return $data;
}
