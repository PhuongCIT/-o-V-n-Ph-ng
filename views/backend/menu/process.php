<?php

use App\Models\Menu;
use App\Libraries\MyClass;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;

date_default_timezone_set("Asia/Ho_Chi_Minh");

if (isset($_POST['AddCategory'])) {
    if (isset($_POST['CategoryId'])) {
        $list_categoryid = $_POST['CategoryId'];
        foreach ($list_categoryid as $id) {
            $category = Category::find($id);
            $menu = new Menu();
            $menu->name = $category->name;
            $menu->link = 'index.php?option=product&cat=' . $category->slug;
            $menu->type = 'category';
            $menu->table_id = $id;
            $menu->sort_order = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->level = 0;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
            $menu->status = 1;
            $menu->save();
            MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
        }
    } else {
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'chưa chọn danh mục']);
    }
    header("location:index.php?option=menu");
}
if (isset($_POST['AddTopic'])) {
    if (isset($_POST['topicid'])) {
        $list_topicid = $_POST['topicid'];
        foreach ($list_topicid as $id) {
            $topic = Topic::find($id);
            $menu = new Menu();
            $menu->name = $topic->name;
            $menu->link = 'index.php?option=topic&cat=' . $topic->slug;
            $menu->type = 'topic';
            $menu->table_id = $id;
            $menu->sort_order = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->level = 1;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
            $menu->status = 1;
            $menu->save();
            MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
        }
    } else {
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'chưa chọn topic']);
    }
    header("location:index.php?option=menu");
}
if (isset($_POST['AddBrand'])) {
    if (isset($_POST['BrandId'])) {
        $list_brandid = $_POST['BrandId'];
        foreach ($list_brandid as $id) {
            $brand = Brand::find($id);
            $menu = new Menu();
            $menu->name = $brand->name;
            $menu->link = 'index.php?option=brand&cat=' . $brand->slug;
            $menu->type = 'brand';
            $menu->table_id = $id;
            $menu->sort_order = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->level = 1;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
            $menu->status = 1;
            $menu->save();
            MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
        }
    } else {
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'chưa chọn thương hiệu']);
    }
    header("location:index.php?option=menu");
}
if (isset($_POST['AddPage'])) {
    if (isset($_POST['PageId'])) {
        $list_pageid = $_POST['PageId'];
        foreach ($list_pageid as $id) {
            $page = Post::find($id);
            $menu = new Menu();
            $menu->name = $page->title;
            $menu->link = 'index.php?option=page&cat=' . $page->slug;
            $menu->type = 'page';
            $menu->table_id = $id;
            $menu->sort_order = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->level = 1;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
            $menu->status = 1;
            $menu->save();
            MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
        }
    } else {
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'chưa chọn page']);
    }
    header("location:index.php?option=menu");
}
if (isset($_POST['AddCustom'])) {
    if (strlen($_POST['name']) > 0 && strlen($_POST['link']) > 0) {
        $menu = new Menu();
        $menu = $_POST['name'];
        $menu->link = $_POST['link'];
        $menu->type = 'custom';
        $menu->sort_order = 1;
        $menu->position = $_POST['position'];
        $menu->parent_id = 0;
        $menu->level = 1;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
        $menu->status = 1;
        $menu->save();
        MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    } else {
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'chưa chọn danh mục']);
    }
    header("location:index.php?option=menu");
}


if (isset($_POST['UPDATE_SORT_ORDER'])) {
    $list = $_POST['sort_order'];
    foreach ($list as $id => $sort_order) {
        $menu = Menu::find($id);
        $menu->sort_order = $sort_order;
        $menu->save();
    }
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'lưu sắp xếp thành công']);
    header("location:index.php?option=menu");
}
