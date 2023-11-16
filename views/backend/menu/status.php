<?php

use App\Models\Menu;
use App\Libraries\MyClass;

date_default_timezone_set("Asia/Ho_Chi_Minh");

$id = $_REQUEST['id'];
$menu =  Menu::find($id);
if ($menu == null) {
    MyClass::set_flash('message', ['msg' => 'Mẫu tin không tồn tại', 'type' => 'danger']);
    header("location:index.php?option=menu");
}
//
$menu->status = ($menu->status == 1) ? 2 : 1;
$menu->updated_at = date('Y-m-d H:i:s');
$menu->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$menu->save();
MyClass::set_flash('message', ['msg' => 'Đổi trạng thái thành công', 'type' => 'success']);
header("location:index.php?option=menu");
