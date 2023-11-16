<?php

use App\Models\User;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$customer =  User::find($id);
if($customer==null){
    MyClass::set_flash('message', ['msg' => 'Mẫu tin không tồn tại', 'type' => 'danger']);
    header("location:index.php?option=customer&cat=trash");
}
//
$customer->delete();// xóa vv
MyClass::set_flash('message', ['msg' => 'Xóa khỏi database thành công', 'type' => 'success']);
header("location:index.php?option=customer&cat=trash");

if (isset($_POST['DESTROY_ALL'])) {
    $list = $_POST['checkId'];
    foreach ($list as $id) {
        $customer = User::find($id);
        $customer->delete();
    }
    MyClass::set_flash('message', ['msg' => 'Xóa khỏi database thành công', 'type' => 'success']);
    header("location:index.php?option=customer&cat=trash");
}
