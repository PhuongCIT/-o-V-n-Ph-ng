<?php

use App\Models\Post;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$page = Post::find($id);
if ($page == null) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Không tồn tại']);
    header("location:index.php?option=page");
}
//
$page->status = 0;
$page->updated_at = date('Y-m-d H:i:s');
$page->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$page->save();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'ném vào thùng rác thành công']);
header("location:index.php?option=page");
