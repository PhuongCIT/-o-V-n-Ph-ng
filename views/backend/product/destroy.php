<?php

use App\Models\Product;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$product = Product::find($id);
if ($product == null) {
    header("location:index.php?option=product&cat=trash");
}
$product->delete(); // xóa vv
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa thành công']);
header("location:index.php?option=product&cat=trash");
