<?php

use App\Models\Product;
use App\Libraries\MyClass;

date_default_timezone_set("Asia/Ho_Chi_Minh");

if (isset($_POST['THEM'])) {
    $product = new Product();
    //lấy từ form
    $product->name = $_POST['name'];
    $product->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
    $product->detail = $_POST['detail'];
    $product->price = $_POST['price'];
    $product->pricesale = $_POST['pricesale'];
    $product->category_id = $_POST['category_id'];
    $product->brand_id = $_POST['brand_id'];
    $product->description = $_POST['description'];
    $product->status = $_POST['status'];
    $product->qty = $_POST['qty'];
    //tư sinh ra
    $product->created_at = date('Y-m-d H:i:s');
    $product->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    //Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/product/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $product->image = $filename;
        }
    }
    var_dump($product);
    //luu vao csdl
    $product->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header("location:index.php?option=product");
}

if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $product = Product::find($id);
    if ($product == null) {
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        header("location:index.php?option=product");
    }
    //lấy từ form
    $product->name = $_POST['name'];
    $product->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
    $product->detail = $_POST['detail'];
    $product->price = $_POST['price'];
    $product->pricesale = $_POST['pricesale'];
    $product->category_id = $_POST['category_id'];
    $product->brand_id = $_POST['brand_id'];
    $product->description = $_POST['description'];
    $product->status = $_POST['status'];
    $product->qty = $_POST['qty'];
    //tư sinh ra
    $product->updated_at = date('Y-m-d H:i:s');
    $product->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    //Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {
        //
        $target_dir = "../public/images/product/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $product->image = $filename;
        }
    }

    var_dump($product);
    //luu vao csdl
    $product->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    header("location:index.php?option=product");
}
