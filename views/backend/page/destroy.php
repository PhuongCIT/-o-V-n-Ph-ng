<?php

use App\Models\Post;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$page = Post::find($id);
if($page==null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Không tồn tại']);
    header("location:index.php?option=page&cat=trash");
}
$page->delete();// xóa trong bảng database
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xáo thành công']);
header("location:index.php?option=page&cat=trash");