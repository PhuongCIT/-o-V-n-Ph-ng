<?php

use App\Libraries\Pagination;
use App\Models\Post;

$title = "Tất cả bài viết";
$limit = 8;
$current = Pagination::pageCurrent();
$offset = Pagination::pageOffset($current, $limit);

$list_post = Post::where('status', '=', 1)->orderBy('created_at', 'DESC')->skip($offset)->limit($limit)->get();
$total = Post::where('status', '=', 1)->count();
?>

<?php require_once "views/frontend/header.php" ?>
<section class="nhd-maincontent py-2">
   <div class="container">
      <div class="row">
         <section class="bg-light">
            <div class="container">
               <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb py-2 my-0">
                     <li class="breadcrumb-item">
                        <a class="text-main" href="index.php">Trang chủ</a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">
                        <a class="text-main"> TẤT CẢ BÀI VIẾT</a>
                     </li>
                  </ol>
               </nav>
            </div>
         </section>
         <section class="dvp-maincontent py-2">
            <div class="container">
               <div class="row">
                  <div class="col-md-3 order-2 order-md-1">
                     <?php require_once "views/frontend/mod-listcategory.php" ?>
                     <?php require_once "views/frontend/mod-listbrand.php" ?>
                     <?php require_once "views/frontend/mod-product-new.php" ?>
                  </div>
                  <div class="col-md-9 order-1 order-md-2">
                     <div class="post-topic-title bg-main">
                        <h3 class="fs-5 py-3 text-center">TIN TỨC</h3>
                     </div>
                     <div class="post-topic mt-3">
                        <?php if (count($list_post) > 0) : ?>
                           <?php foreach ($list_post as $post) : ?>
                              <div class="row post-item mb-4">
                                 <div class="col-4 col-md-4">
                                    <div class="post-item-image">
                                       <a href="post_detail.html">
                                          <img src="../public/images/post/<?= $post->image; ?>" class="img-fluid" alt="">
                                       </a>
                                    </div>
                                 </div>
                                 <div class="col-8 col-md-8">
                                    <h2 class="post-item-title fs-5 py-1">
                                       <a href="post_detail.html">
                                          <?= $post->title; ?>
                                       </a>
                                    </h2>
                                    <p><?= $post->detail; ?></p>
                                 </div>
                              </div>
                           <?php endforeach; ?>
                        <?php endif; ?>
                        <!-- <div class="row post-item mb-4">
                           <div class="col-4 col-md-4">
                              <div class="post-item-image">
                                 <a href="post_detail.html">
                                    <img src="../public/images/post/post-2.jpg" class="img-fluid" alt="">
                                 </a>
                              </div>
                           </div>
                           <div class="col-8 col-md-8">
                              <h2 class="post-item-title text-main fs-5 py-1">
                                 <a href="post_detail.html">
                                    Video provides a powerful way to help you prove your point 2
                                 </a>
                              </h2>
                              <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                                 can paste in the embed code for the video you want to add Video provides a powerful way to
                                 help you prove your point. When you click Online Video, you can paste in the embed code for
                                 the video you want to add</p>
                           </div>
                        </div>
                        <div class="row post-item mb-4">
                           <div class="col-4 col-md-4">
                              <div class="post-item-image">
                                 <a href="post_detail.html">
                                    <img src="../public/images/post/post-1.jpg" class="img-fluid" alt="">
                                 </a>
                              </div>
                           </div>
                           <div class="col-8 col-md-8">
                              <h2 class="post-item-title text-main fs-5 py-1">
                                 <a href="post_detail.html">
                                    Video provides a powerful way to help you prove your point 2
                                 </a>
                              </h2>
                              <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                                 can paste in the embed code for the video you want to add Video provides a powerful way to
                                 help you prove your point. When you click Online Video, you can paste in the embed code for
                                 the video you want to add</p>
                           </div>
                        </div>
                        <div class="row post-item mb-4">
                           <div class="col-4 col-md-4">
                              <div class="post-item-image">
                                 <a href="post_detail.html">
                                    <img src="../public/images/post/post-2.jpg" class="img-fluid" alt="">
                                 </a>
                              </div>
                           </div>
                           <div class="col-8 col-md-8">
                              <h2 class="post-item-title text-main fs-5 py-1">
                                 <a href="post_detail.html">
                                    Video provides a powerful way to help you prove your point 22
                                 </a>
                              </h2>
                              <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                                 can paste in the embed code for the video you want to add Video provides a powerful way to
                                 help you prove your point. When you click Online Video, you can paste in the embed code for
                                 the video you want to add</p>
                           </div>
                        </div>
                        <div class="row post-item mb-4">
                           <div class="col-4 col-md-4">
                              <div class="post-item-image">
                                 <a href="post_detail.html">
                                    <img src="../public/images/post/post-1.jpg" class="img-fluid" alt="">
                                 </a>
                              </div>
                           </div>
                           <div class="col-8 col-md-8">
                              <h2 class="post-item-title text-main fs-5 py-1">
                                 <a href="post_detail.html">
                                    Video provides a powerful way to help you prove your point 3
                                 </a>
                              </h2>
                              <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                                 can paste in the embed code for the video you want to add Video provides a powerful way to
                                 help you prove your point. When you click Online Video, you can paste in the embed code for
                                 the video you want to add</p>
                           </div>
                        </div>
                        <div class="row post-item mb-4">
                           <div class="col-4 col-md-4">
                              <div class="post-item-image">
                                 <a href="post_detail.html">
                                    <img src="../public/images/post/post-1.jpg" class="img-fluid" alt="">
                                 </a>
                              </div>
                           </div>
                           <div class="col-8 col-md-8">
                              <h2 class="post-item-title text-main fs-5 py-1">
                                 <a href="post_detail.html">
                                    Video provides a powerful way to help you prove your point 1
                                 </a>
                              </h2>
                              <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                                 can paste in the embed code for the video you want to add Video provides a powerful way to
                                 help you prove your point. When you click Online Video, you can paste in the embed code for
                                 the video you want to add</p>
                           </div>
                        </div>
                        <div class="row post-item mb-4">
                           <div class="col-4 col-md-4">
                              <div class="post-item-image">
                                 <a href="post_detail.html">
                                    <img src="../public/images/post/post-2.jpg" class="img-fluid" alt="">
                                 </a>
                              </div>
                           </div>
                           <div class="col-8 col-md-8">
                              <h2 class="post-item-title text-main fs-5 py-1">
                                 <a href="post_detail.html">
                                    Video provides a powerful way to help you prove your point 2
                                 </a>
                              </h2>
                              <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                                 can paste in the embed code for the video you want to add Video provides a powerful way to
                                 help you prove your point. When you click Online Video, you can paste in the embed code for
                                 the video you want to add</p>
                           </div>
                        </div>
                        <div class="row post-item mb-4">
                           <div class="col-4 col-md-4">
                              <div class="post-item-image">
                                 <a href="post_detail.html">
                                    <img src="../public/images/post/post-3.jpg" class="img-fluid" alt="">
                                 </a>
                              </div>
                           </div>
                           <div class="col-8 col-md-8">
                              <h2 class="post-item-title text-main fs-5 py-1">
                                 <a href="post_detail.html">
                                    Video provides a powerful way to help you prove your point 2
                                 </a>
                              </h2>
                              <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                                 can paste in the embed code for the video you want to add Video provides a powerful way to
                                 help you prove your point. When you click Online Video, you can paste in the embed code for
                                 the video you want to add</p>
                           </div>
                        </div>
                        <div class="row post-item mb-4">
                           <div class="col-4 col-md-4">
                              <div class="post-item-image">
                                 <a href="post_detail.html">
                                    <img src="../public/images/post/post-2.jpg" class="img-fluid" alt="">
                                 </a>
                              </div>
                           </div>
                           <div class="col-8 col-md-8">
                              <h2 class="post-item-title text-main fs-5 py-1">
                                 <a href="post_detail.html">
                                    Video provides a powerful way to help you prove your point 22
                                 </a>
                              </h2>
                              <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                                 can paste in the embed code for the video you want to add Video provides a powerful way to
                                 help you prove your point. When you click Online Video, you can paste in the embed code for
                                 the video you want to add</p>
                           </div>
                        </div>
                        <div class="row post-item mb-4">
                           <div class="col-4 col-md-4">
                              <div class="post-item-image">
                                 <a href="post_detail.html">
                                    <img src="../public/images/post/post-3.jpg" class="img-fluid" alt="">
                                 </a>
                              </div>
                           </div>
                           <div class="col-8 col-md-8">
                              <h2 class="post-item-title text-main fs-5 py-1">
                                 <a href="post_detail.html">
                                    Video provides a powerful way to help you prove your point 3
                                 </a>
                              </h2>
                              <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                                 can paste in the embed code for the video you want to add Video provides a powerful way to
                                 help you prove your point. When you click Online Video, you can paste in the embed code for
                                 the video you want to add</p>
                           </div>
                        </div> -->
                     </div>
                     <nav aria-label="Phân trang">
                        <ul class="pagination justify-content-center">
                           <li class="page-item">
                              <a class="page-link text-main" href="product_category.html" aria-label="Previous">
                                 <span aria-hidden="true">&laquo;</span>
                              </a>
                           </li>
                           <li class="page-item">
                              <a class="page-link text-main" href="product_category.html">1</a>
                           </li>
                           <li class="page-item">
                              <a class="page-link text-main" href="product_category.html">2</a>
                           </li>
                           <li class="page-item">
                              <a class="page-link text-main" href="product_category.html">3</a>
                           </li>
                           <li class="page-item">
                              <a class="page-link text-main" href="product_category.html" aria-label="Next">
                                 <span aria-hidden="true">&raquo;</span>
                              </a>
                           </li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
         </section>

</section>
<?php require_once "views/frontend/footer.php" ?>