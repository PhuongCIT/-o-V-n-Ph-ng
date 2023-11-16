<?php

use App\Models\Product;
use App\Models\Post;

$keyword = $_REQUEST['keyword'];
$list_product = Product::where([['status', '=', 1], ['name', 'like', "%" . $keyword . "%"]])->orderBy('created_at', 'desc')->get();
$list_post = Post::where([['status', '=', 1], ['title', 'like', "%" . $keyword . "%"]])->orderBy('created_at', 'desc')->get();
$list_item = array();
foreach ($list_product as $product) {
    $item = array(
        'name' => $product->name,
        'slug' => $product->slug,
        'image' => "product/" . $product->image,
        'table' => 'product',
    );
    $list_item[] = $item;
}
foreach ($list_post as $post) {
    $item = array(
        'name' => $post->title,
        'slug' => $post->slug,
        'image' => "post/" . $post->image,
        'table' => 'post',
    );
    $list_item[] = $item;
}
$title = "Tìm kiếm thông tin";; ?>

<?php require_once "views/frontend/header.php"; ?>
<section class="bg-light">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
                <li class="breadcrumb-item">
                    <a class="text-main" href="index.php">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Tìm kiếm
                </li>
            </ol>
        </nav>
    </div>
</section>
<section class="hdl-maincontent py-2">
    <div class="container">
        <div class="row">
            <!-- <div class="col-md-3 order-2 order-md-1">

                <?php require_once "views/frontend/mod_listcategory.php"; ?>
                <?php require_once "views/frontend/mod_listbrand.php"; ?>
                <?php require_once "views/frontend/mod_product_new.php"; ?>

            </div> -->
            <div class="col-md-9 order-1 order-md-2">
                <div class="category-title bg-main">
                    <h3 class="fs-5 py-3 text-center">NỘI DUNG TÌM KIẾM</h3>
                </div>
                <div class="product-category mt-3">
                    <div class="row product-list">
                        <?php foreach ($list_item as $product) : ?>
                            <div class="col-6 col-md-3 mb-4">
                                <?php require 'views/frontend/product_item.php'; ?>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once "views/frontend/footer.php"; ?>