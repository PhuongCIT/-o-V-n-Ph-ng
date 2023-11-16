<?php

use App\Models\Contact;
date_default_timezone_set("Asia/Ho_Chi_Minh");

$id = $_REQUEST['id'];
$contact =  Contact::find($id);
if($contact==null){
    header("location:index.php?option=contact&cat=trash");
}
//
$contact->status =2;
$contact->updated_at = date('Y-m-d H:i:s');
$contact->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$contact->save();
header("location:index.php?option=contact&cat=trash");