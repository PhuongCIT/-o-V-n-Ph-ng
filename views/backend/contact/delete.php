<?php

use App\Libraries\MyClass;
use App\Models\Contact;

date_default_timezone_set("Asia/Ho_Chi_Minh");

$id = $_REQUEST['id'];
$contact =  Contact::find($id);
if ($contact == null) {
    MyClass::set_flash('message', ['msg' => 'Mẫu tin không tồn tại', 'type' => 'danger']);
    header("location:index.php?option=contact");
}
//
$contact->status = 0;
$contact->updated_at = date('Y-m-d H:i:s');
$contact->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$contact->save();
MyClass::set_flash('message', ['msg' => 'Thành công', 'type' => 'success']);
header("location:index.php?option=contact");

if(isset($_POST['DELETE_ALL'])){
    $list=$_POST['checkId'];
    foreach($list as $id){
        $contact=Contact::find($id);
        $contact->status=0;
        $contact->save();
    }
    MyClass::set_flash('message', ['msg' => 'Xóa vào thùng rác thành công', 'type' => 'success']);  
    header("location:index.php?option=contact");
}