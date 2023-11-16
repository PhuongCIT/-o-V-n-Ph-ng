<?php

use App\Models\Banner;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$banner =  Banner::find($id);
if($banner==null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Không tồn tại']);
    header("location:index.php?option=banner&cat=trash");
}
//
$banner->status =2;
$banner->updated_at = date('Y-m-d H:i:s');
$banner->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$banner->save();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục thành công']);
header("location:index.php?option=banner&cat=trash");