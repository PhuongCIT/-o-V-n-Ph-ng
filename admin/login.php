<?php
session_start();
ob_start();
require_once "../vendor/autoload.php";
if (isset($_SESSION['useradmin'])) {
    header("location:index.php");
}

use App\Models\User;

$error_login = "";
if (isset($_POST['DANGNHAP'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $args = [
        ['password', '=', $password],
        ['roles', '=', 1],
        ['status', '=', 1],
    ];
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $args[] = ['email', '=', $username];
    } else {
        $args[] = ['username', '=', $username];
    }
    $user = User::where($args)->first();
    if ($user != null) {
        $_SESSION['useradmin'] = $username;
        $_SESSION['user_id'] = $user->id;
        $_SESSION['name'] = $user->name;
        $_SESSION['image'] = isset($user->image) ? $user->image : 'user.jpg';
        header("location:index.php");
    } else {
        $error_login = "tài khoản không hợp lệ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">
    <style>
        .card {
            max-width: 600px;
            margin: auto;
            box-shadow: 1px 0px 3px black;
            border-radius: 10px;
        }
    </style>
    <title>Đăng nhập quản trị</title>
</head>

<body>
    <form action="login.php" method="post">
        <div class="card mt-5 p-4">
            <h1 class="text-danger fs-3 text-center">ĐĂNG NHẬP</h1>
            <div class="mb-3">
                <label for=""><strong>Tên tài khoản (*)</strong></label>
                <input class="form-control" type="text" name="username" placeholder="Tên đăng nhập hoặc email" required>
            </div>
            <div class="mb-3">
                <label for=""><strong>Mật khẩu (*)</strong></label>
                <input class="form-control" type="password" name="password" placeholder="mật khẩu" required>
            </div>
            <div class="mb-3 text-end">
                <input type="submit" value="Đăng nhặp" name="DANGNHAP" class="btn btn-success">
            </div>
            <div class="mb-3">
                <p>Chú ý: (*) bắt buộc phải điền thông tin</p>
                <?php if ($error_login != "") : ?>
                    <p class="text-danger"><?= $error_login; ?></p>
                <?php endif; ?>
            </div>

        </div>


    </form>


</body>

</html>