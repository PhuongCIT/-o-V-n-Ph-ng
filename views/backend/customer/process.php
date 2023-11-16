<?php

use App\Models\User;
use App\Libraries\MyClass;

date_default_timezone_set("Asia/Ho_Chi_Minh");

if (isset($_POST['THEM'])) {
    $customer = new User();
    //lấy từ form
    $customer->name = $_POST['name'];
    $customer->phone = $_POST['phone'];
    $customer->email = $_POST['email'];
    $customer->gender = $_POST['gender'];
    $customer->username = $_POST['username'];
    $customer->password = $_POST['password'];
    $customer->address = $_POST['address'];
    $customer->roles = 0;
    $customer->status = $_POST['status'];
    //tư sinh ra
    $customer->created_at = date('Y-m-d H:i:s');
    $customer->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    // kiểm tra nhập lại mật khẩu
    if ($_POST['password'] != $_POST['password_re']) {
        MyClass::set_flash('message', ['msg' => 'mật khẩu không khớp', 'type' => 'denger']);
        header("location:index.php?option=customer&cat=create");
    }
    //Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/user/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $customer->image = $filename;
        }
    }
    //tư sinh ra
    $customer->created_at = date('Y-m-d H:i:s');
    $customer->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($customer);
    //luu vao csdl
    //ínet
    $customer->save();
    MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
    header("location:index.php?option=customer");
}
//-----------------------------------
if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $customer = User::find($id);
    if ($customer == null) {
        MyClass::set_flash('message', ['msg' => 'không tồn tại', 'type' => 'denger']);
        header("location:index.php?option=customer");
    }
    //lấy từ form
    $customer->name = $_POST['name'];
    $customer->phone = $_POST['phone'];
    $customer->email = $_POST['email'];
    $customer->username = $_POST['username'];
    $customer->password = $_POST['password'];
    $customer->address = $_POST['address'];
    $customer->roles = 0;
    $customer->status = $_POST['status'];
    //tư sinh ra
    $customer->updated_at = date('Y-m-d H:i:s');
    $customer->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($customer);
    //Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {
        //

        //
        $target_dir = "../public/images/user/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $customer->image = $filename;
        }
    }

    //luu vao csdl
    //ínet
    $customer->save();
    MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
    //
    header("location:index.php?option=customer");
}
