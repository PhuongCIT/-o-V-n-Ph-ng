<?php

use App\Models\Category;
date_default_timezone_set("Asia/Ho_Chi_Minh");

$id = $_REQUEST['id'];
$category =  Category::find($id);
if($category==null){
    header("location:index.php?option=category");
}
//
$category->status =($category->status == 1) ? 2 : 1;
$category->updated_at = date('Y-m-d H:i:s');
$category->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$category->save();
header("location:index.php?option=category");