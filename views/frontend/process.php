<?php

use App\Models\Contact;
use App\Libraries\MyClass;

if(isset($_POST['THEM']))
{
    $contact=new Contact();
    //lấy từ form
    $contact->name = $_POST['name'];
    $contact->email = $_POST['email'];
    $contact->status = $_POST['status'];
    $contact->phone = $_POST['phone'];
    $contact->title = $_POST['title'];
    $contact->content = $_POST['content'];
    $contact->replay_id = $_POST['replay_id'];
    
     //Xử lí uploadfile
   
    //tư sinh ra
    $contact->created_at = date('Y-m-d-H:i:s');
    $contact->created_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($contact);
    //luu vao csdl
    //ínet
    $contact->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);

    //
    header("location:index.php?option=contact");
  
}