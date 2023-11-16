<div class="product-item border">
        <div class="product-item-image">
                <a href="index.php?option=product&slug=<?= $product->slug; ?>">
                        <img src="public/images/product/<?= $product->image; ?>" class="img-fluid" style="width:230px; height:260px;" alt="<?= $product->image; ?>" id="img1">
                        <img src="public/images/product/<?= $product->image; ?>" class="img-fluid" alt="<?= $product->image; ?>" style="width:220px; height:260px;" id="img2">
                </a>
        </div>
        <h2 class="product-item-name text-main text-center fs-5 ">
                <a href="index.php?option=product&slug=<?= $product->slug; ?>"><?= $product->name; ?></a>
        </h2>
        <h3 class="product-item-price fs-6 p-2 d-flex">
                <div class="flex-fill"><del><?= number_format($product->price); ?>đ</del></div>
                <div class="flex-fill text-end text-main"><?= number_format($product->pricesale); ?>đ</div>
        </h3>
</div>