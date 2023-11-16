<?php

use App\Models\Brand;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$brand =  Brand::find($id);
if($brand==null){
    MyClass::set_flash('message',['msg'=>'Mẫu tin không tồn tại','type'=>'denger']);
    header("location:index.php?option=brand");
}
//
$brand->delete();// xóa vv
MyClass::set_flash('message',['msg'=>'Xóa khỏi database thành công','type'=>'success']); 
header("location:index.php?option=brand&cat=trash");
//xóa nhiều mẫu tin
if(isset($_POST['DESTROY_ALL'])){
    $list=$_POST['checkId'];
    foreach($list as $id){
        $brand=Brand::find($id);
        $brand->delete();
    }
    MyClass::set_flash('message', ['msg' => 'Xóa vào thùng rác thành công', 'type' => 'success']);  
    header("location:index.php?option=brand&cat=trash");
}