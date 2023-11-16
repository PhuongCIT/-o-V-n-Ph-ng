<?php
use App\Libraries\MyClass;
use App\Models\Banner;

$id = $_REQUEST['id'];
$banner =  Banner::find($id);
if($banner==null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Không tồn tại']);
    header("location:index.php?option=banner");
}
//
$banner->status =0;
$banner->updated_at = date('Y-m-d H:i:s');
$banner->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$banner->save();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Ném vào thùng rác thành công']);
header("location:index.php?option=banner");

if(isset($_POST['DELETE_ALL'])){
    $list=$_POST['checkId'];
    foreach($list as $id){
        $banner=Banner::find($id);
        $banner->status=0;
        $banner->save();
    }
    MyClass::set_flash('message', ['msg' => 'Ném vào thùng rác thành công', 'type' => 'success']);  
    header("location:index.php?option=banner");
}