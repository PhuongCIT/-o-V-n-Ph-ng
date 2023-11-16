<?php
use App\Models\Post;
//&cat=gioi-thieu
$slug=$_REQUEST['cat'];
$page=Post::where([['slug','=',$slug],['type','=','page'],['status','=',1]])->first();
?>



      <div class="container">
         <div class="row">
            <div class="col-md-3 order-2 order-md-1">
               <ul class="list-group mb-3 list-page">
                  <li class="list-group-item bg-main py-3">Các trang khác</li>
                  <li class="list-group-item">
                     <a href="index.php?option=page&cat=chinh-sach-mua-hang">Chính sách mua hàng</a>
                  </li>
                  <li class="list-group-item">
                     <a href="index.php?option=page&cat=chinh-sach-van-chuyen">Chính sách vận chuyển</a>
                  </li>
                  <li class="list-group-item">
                     <a href="index.php?option=page&cat=chinh-sach-doi-tra">Chính sách đổi trả</a>
                  </li>
                  <li class="list-group-item">
                     <a href="index.php?option=page&cat=chinh-sach-bao-hanh">Chính sách bảo hành</a>
                  </li>
               </ul>
            </div>
            <div class="col-md-9 order-1 order-md-2">
               <h1 class="fs-2 text-main"><?=$page->title;?></h1>
               <p><?=$page->detail;?></p>
            </div>
            </div>
        