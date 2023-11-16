<?php

use App\Libraries\MyClass;
use App\Models\Order;

date_default_timezone_set("Asia/Ho_Chi_Minh");

$id = $_REQUEST['id'];
$order =  Order::find($id);
if ($order == null) {
    MyClass::set_flash('message', ['msg' => 'đơn hàng không tồn tại', 'type' => 'danger']);
    header("location:index.php?option=order");
}
//
$order->status = 5;
$order->updated_at = date('Y-m-d H:i:s');
$order->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$order->save();
MyClass::set_flash('message', ['msg' => 'hủy đơn hàng thành công', 'type' => 'success']);
header("location:index.php?option=order");

if (isset($_POST['DELETE_ALL'])) {
    $list = $_POST['checkId'];
    foreach ($list as $id) {
        $order = Order::find($id);
        $order->status = 5;
        $order->save();
    }
    MyClass::set_flash('message', ['msg' => 'hủy đơn hàng thành công', 'type' => 'success']);
    header("location:index.php?option=order");
}
