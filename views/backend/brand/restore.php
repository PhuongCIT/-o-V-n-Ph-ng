<?php

use App\Models\Brand;
use App\Libraries\MyClass;
date_default_timezone_set("Asia/Ho_Chi_Minh");

$id = $_REQUEST['id'];
$brand =  Brand::find($id);
if($brand==null){
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'denger']);
    header("location:index.php?option=brand&cat=trash");
}
//
$brand->status =2;
$brand->updated_at = date('Y-m-d H:i:s');
$brand->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$brand->save();
MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
header("location:index.php?option=brand&cat=trash");