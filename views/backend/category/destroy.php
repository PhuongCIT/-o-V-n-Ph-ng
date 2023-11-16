<?php

use App\Models\Category;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$category = Category::find($id);
if ($category == null) {
    MyClass::set_flash('message', ['msg' => 'MẪu tin không tồn tại', 'type' => 'danger']);
    header("location:index.php?option=category&cat=trash");
}
$category->delete(); // xóa vv
MyClass::set_flash('message', ['msg' => 'Xóa khỏi database thành công', 'type' => 'success']);
header("location:index.php?option=category&cat=trash");

if (isset($_POST['DESTROY_ALL'])) {
    $list = $_POST['checkId'];
    foreach ($list as $id) {
        $category = Category::find($id);
        $category->delete();
    }
    MyClass::set_flash('message', ['msg' => 'Xóa khỏi database thành công', 'type' => 'success']);
    header("location:index.php?option=category&cat=trash");
}
