<?php

use App\Libraries\MyClass;
use App\Models\Menu;

date_default_timezone_set("Asia/Ho_Chi_Minh");

$id = $_REQUEST['id'];
$menu =  Menu::find($id);
if ($menu == null) {
    header("location:index.php?option=menu");
}
//
$menu->status = 0;
$menu->updated_at = date('Y-m-d H:i:s');
$menu->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$menu->save();
MyClass::set_flash('message', ['msg' => 'Xóa vào thùng rác thành công', 'type' => 'success']);
header("location:index.php?option=menu");

if (isset($_POST['DELETE_ALL'])) {
    $list = $_POST['checkId'];
    foreach ($list as $id) {
        $menu = Menu::find($id);
        $menu->status = 0;
        $menu->save();
    }
    MyClass::set_flash('message', ['msg' => 'Xóa vào thùng rác thành công', 'type' => 'success']);
    header("location:index.php?option=menu");
}
