<?php

use App\Models\Post;
date_default_timezone_set("Asia/Ho_Chi_Minh");

$id = $_REQUEST['id'];
$post =  Post::find($id);
if($post==null){
    header("location:index.php?option=post");
}
//
$post->status =($post->status == 1) ? 2 : 1;
$post->updated_at = date('Y-m-d H:i:s');
$post->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$post->save();
header("location:index.php?option=post");