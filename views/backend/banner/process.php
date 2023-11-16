<?php

use App\Models\Banner;
use App\Libraries\MyClass;
//cài đặt múi giờ 
date_default_timezone_set("Asia/Ho_Chi_Minh");

if (isset($_POST['THEM'])) {
    $banner = new Banner();
    //lấy từ form
    $banner->name = $_POST['name'];
    $banner->link = $_POST['link'];
    $banner->position = $_POST['position'];
    $banner->sort_order = $_POST['sort_order']+1;
    $banner->status = $_POST['status'];
    //tự sinh ra
    $banner->created_at = date('Y-m-d H:i:s');
    $banner->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    //xử lý upload file
    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/banner/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = $banner->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $banner->image = $filename;
        }
    }
    var_dump($banner);
    $banner->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    //chuyên hướng về index
    header("location:index.php?option=banner");
}

if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['user_id'];
    $banner = Banner::find($id);
    if ($brand == null) {
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Không tồn tại']);
        header("location:index.php?option=banner");
    }
    //lấy từ form
    $banner->name = $_POST['name'];
    $banner->link = $_POST['link'];
    $banner->position = $_POST['position'];
    $banner->sort_order = $_POST['sort_order']+1;
    $banner->status = $_POST['status'];
    //tự sinh ra
    $banner->updated_at = date('Y-m-d H:i:s');
    $banner->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    //xử lý upload file
    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/banner/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = $banner->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $banner->image = $filename;
        }
    }
    var_dump($banner);
    $banner->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    //chuyên hướng về index
    header("location:index.php?option=banner");
}
