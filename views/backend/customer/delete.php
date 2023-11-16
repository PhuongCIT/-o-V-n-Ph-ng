<?php

use App\Libraries\MyClass;
use App\Models\User;

date_default_timezone_set("Asia/Ho_Chi_Minh");

$id = $_REQUEST['id'];
$customer =  User::find($id);
if ($customer == null) {
    MyClass::set_flash('message', ['msg' => 'không tồn tại', 'type' => 'danger']);
    header("location:index.php?option=customer");
}
//
$customer->status = 0;
$customer->updated_at = date('Y-m-d H:i:s');
$customer->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$customer->save();
MyClass::set_flash('message', ['msg' => 'Xóa thành công', 'type' => 'success']);
header("location:index.php?option=customer");

if (isset($_POST['DELETE_ALL'])) {
    $list = $_POST['checkId'];
    foreach ($list as $id) {
        $customer = User::find($id);
        $customer->status = 0;
        $customer->save();
    }
    MyClass::set_flash('message', ['msg' => 'Xóa vào thùng rác thành công', 'type' => 'success']);
    header("location:index.php?option=customer");
}
