<?php

use App\Models\Banner;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$banner =  Banner::find($id);
if ($banner == null) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Không tồn tại']);
    header("location:index.php?option=banner");
}
//
$banner->delete(); // xóa vv
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa thành công']);
header("location:index.php?option=banner&cat=trash");
