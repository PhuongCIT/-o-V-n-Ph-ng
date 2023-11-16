<?php

use App\Models\Contact;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$contact =  Contact::find($id);
if($contact==null){
    MyClass::set_flash('message', ['msg' => 'Mẫu tin không tồn tại', 'type' => 'danger']);
    header("location:index.php?option=contact&cat=trash");
}
//
$contact->delete();// xóa vv
MyClass::set_flash('message', ['msg' => 'Xóa khỏi database thành công', 'type' => 'success']);
header("location:index.php?option=contact&cat=trash");

if (isset($_POST['DESTROY_ALL'])) {
    $list = $_POST['checkId'];
    foreach ($list as $id) {
        $contact = Contact::find($id);
        $contact->delete();
    }
    MyClass::set_flash('message', ['msg' => 'Xóa khỏi database thành công', 'type' => 'success']);
    header("location:index.php?option=contact&cat=trash");
}
