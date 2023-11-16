<?php

use App\Models\Post;

$id = $_REQUEST['id'];
$post = Post::find($id);
if($post==null){
    header("location:index.php?option=post&cat=trash");
}
$post->delete();// xóa vv
header("location:index.php?option=post&cat=trash");