<?php

use App\Models\User;
use App\Libraries\MyClass;;

$id = $_REQUEST['id'];
$user =  User::find($id);
if($user==null){
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'không tồn tại']);
    header("location:index.php?option=user");
}
//
$user->delete();// xóa vv
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa thành công']);
header("location:index.php?option=user&cat=trash");