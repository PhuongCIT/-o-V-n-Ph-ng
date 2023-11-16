<?php

use App\Models\Category;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$category = Category::find($id);
if($category==null){
    header("location:index.php?option=category");
}
//
$category->status =0;
$category->updated_at = date('Y-m-d H:i:s');
$category->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$category->save();
header("location:index.php?option=category");

if(isset($_POST['DELETE_ALL'])){
    $list=$_POST['checkId'];
    foreach($list as $id){
        $category=Category::find($id);
        $category->status=0;
        $category->save();
    }
    MyClass::set_flash('message', ['msg' => 'Xóa vào thùng rác thành công', 'type' => 'success']);  
    header("location:index.php?option=category");
}
