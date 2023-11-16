<?php

use App\Models\Product;
use App\Libraries\MyClass;

date_default_timezone_set("Asia/Ho_Chi_Minh");

$id = $_REQUEST['id'];
$product =  Product::find($id);
if($product==null){
    header("location:index.php?option=product");
}
//
$product->status =($product->status == 1) ? 2 : 1;
$product->updated_at = date('Y-m-d H:i:s');
$product->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$product->save();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Chuyển trạng thái thành công']);
header("location:index.php?option=product");