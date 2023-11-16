<?php

use App\Models\Contact;
use App\Libraries\MyClass;

date_default_timezone_set("Asia/Ho_Chi_Minh");

if(isset($_POST['THEM'])){
    $contact= new Contact();
    //lấy từ form
    $contact->name= $_POST ['name'];
    $contact->title= $_POST['title'];
    $contact->content= $_POST ['content'];
    $contact->replay= $_POST ['replay'];   
    $contact->status= 1;
    //tự sinh ra
    $contact->created_at= date('Y-m-d H:i:s');
    $contact->created_by= (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($contact);
    //lưu vào csdl
    $contact->save();
    //chuyên hướng về index
    header("location:index.php?option=contact");
}
if(isset($_POST['TRALOI'])){
    $id=$_POST['id'];
    $contact=Contact::find($id);
    $contact->replay= $_POST ['replay'];   
    $contact->status= 2;
    //tự sinh ra
    $contact->updated_at= date('Y-m-d H:i:s');
    $contact->updated_by= (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    $contact->save();
    MyClass::set_flash('message', ['msg' => 'Trả lời thành công', 'type' => 'success']);
    header("location:index.php?option=contact");
}