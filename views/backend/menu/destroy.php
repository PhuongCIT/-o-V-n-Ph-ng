<?php

use App\Models\Menu;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$menu =  Menu::find($id);
if($menu==null){
    MyClass::set_flash('message', ['msg' => 'Mẫu tin không tồn tại', 'type' => 'danger']);
    header("location:index.php?option=menu&cat=trash");
}
//
$menu->delete();// xóa vv
MyClass::set_flash('message', ['msg' => 'Xóa khỏi database thành công', 'type' => 'success']);
header("location:index.php?option=menu&cat=trash");

if (isset($_POST['DESTROY_ALL'])) {
    $list = $_POST['checkId'];
    foreach ($list as $id) {
        $menu = Menu::find($id);
        $menu->delete();
    }
    MyClass::set_flash('message', ['msg' => 'Xóa khỏi database thành công', 'type' => 'success']);
    header("location:index.php?option=menu&cat=trash");
}
