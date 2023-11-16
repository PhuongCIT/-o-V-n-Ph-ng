<?php

use App\Models\Post;
use App\Libraries\MyClass;
//cài đặt múi giờ 
date_default_timezone_set("Asia/Ho_Chi_Minh");

if (isset($_POST['THEM'])) {
    $post = new Post();
    //lấy từ form
    $post->title = $_POST['title'];
    $post->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
    $post->description = $_POST['description'];
    $post->detail = $_POST['detail'];
    $post->topic_id = $_POST['topic_id'];
    $post->type = $_POST['type'];
    $post->status = $_POST['status'];
    //tư sinh ra
    $post->created_at = date('Y-m-d H:i:s');
    $post->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($post);
    //Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/post/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = $post->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $post->image = $filename;
        }
    }
    //luu vao csdl
    $post->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header("location:index.php?option=post");
}

if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $post = Post::find($id);
    if ($post == null) {
        header("location:index.php?option=post");
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Không tồn tại']);

    }
    //lấy từ form
    $post->title = $_POST['title'];
    $post->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
    $post->description = $_POST['description'];
    $post->detail = $_POST['detail'];
    $post->topic_id = $_POST['topic_id'];
    $post->type = $_POST['type'];
    $post->status = $_POST['status'];
    //tư sinh ra
    $post->updated_at = date('Y-m-d H:i:s');
    $post->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    //Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/post/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = $post->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $post->image = $filename;
        }
    }
    var_dump($post);
    $post->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);

    //
    header("location:index.php?option=post");
}
