<?php

use App\Models\Menu;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Brand;

$list_menu = Menu::where('status', '!=', 0)
   ->orderBy('position', 'asc')
   ->orderBy('sort_order', 'asc')
   ->orderBy('created_at', 'desc')
   ->get();
$list_category = Category::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
$list_brand = Brand::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
$list_topic = Topic::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
$list_post = Post::where([['status', '!=', 0], ['type', '=', 'page']])->orderBy('created_at', 'desc')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=menu&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả menu</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header ">
               <div class="row">
                  <div class="col-sm-6 ">
                     <a href="index.php?option=menu&cat=delete" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Xóa</a>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="index.php?option=menu&cat=trash" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Thùng rác</a>
                  </div>
               </div>
            </div>
            <div class="card-body p-2">
               <?php require_once "../views/backend/message.php"; ?>
               <div class="row">
                  <div class="col-md-3">
                     <div class="accordion" id="accordionExample">
                        <div class="card mb-0 p-3">
                           <select name="position" class="form-control">
                              <option value="mainmenu">Main Menu</option>
                              <option value="footermenu">Footer Menu</option>
                           </select>
                        </div>
                        <div class="card mb-0">
                           <div class="card-header" id="headingCategory">
                              <strong data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
                                 Danh mục sản phẩm
                              </strong>
                           </div>
                           <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionExample">
                              <div class="card-body p-3">
                                 <?php foreach ($list_category as $category) : ?>
                                    <div class="form-check">
                                       <input name="CategoryId[]" class="form-check-input" type="checkbox" value="<?= $category->id; ?>" id="CategoryId<?= $category->id; ?>">
                                       <label class="form-check-label" for="CategoryId<?= $category->id; ?>">
                                          <?= $category->name; ?>
                                       </label>
                                    </div>
                                 <?php endforeach; ?>
                                 <div class="my-3">
                                    <button name="AddCategory" class="btn btn-sm btn-success form-control">Thêm</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card mb-0">
                           <div class="card-header" id="headingBrand">
                              <strong data-toggle="collapse" data-target="#collapseBrand" aria-expanded="true" aria-controls="collapseBrand">
                                 Thương hiệu
                              </strong>
                           </div>
                           <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand" data-parent="#accordionExample">
                              <div class="card-body p-3">
                                 <?php foreach ($list_brand as $brand) : ?>
                                    <div class="form-check">
                                       <input name="BrandId[]" class="form-check-input" type="checkbox" value="<?= $brand->id; ?>" id="BrandId<?= $brand->id; ?>">
                                       <label class="form-check-label" for="BrandId<?= $brand->id; ?>">
                                          <?= $brand->name; ?>
                                       </label>
                                    </div>
                                 <?php endforeach; ?>
                                 <div class="my-3">
                                    <button name="AddBrand" class="btn btn-sm btn-success form-control">Thêm</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card mb-0">
                           <div class="card-header" id="headingTopic">
                              <strong data-toggle="collapse" data-target="#collapseTopic" aria-expanded="true" aria-controls="collapseTopic">
                                 Chủ đề bài viết
                              </strong>
                           </div>
                           <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic" data-parent="#accordionExample">
                              <div class="card-body p-3">
                                 <?php foreach ($list_topic as $topic) : ?>
                                    <div class="form-check">
                                       <input name="TopicId[]" class="form-check-input" type="checkbox" value="<?= $topic->id; ?>" id="TopicId<?= $topic->id; ?>">
                                       <label class="form-check-label" for="TopicId<?= $topic->id; ?>">
                                          <?= $topic->name; ?>
                                       </label>
                                    </div>
                                 <?php endforeach; ?>
                                 <div class="my-3">
                                    <button name="AddTopic" class="btn btn-sm btn-success form-control">Thêm</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card mb-0">
                           <div class="card-header" id="headingPage">
                              <strong data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
                                 Trang đơn
                              </strong>
                           </div>
                           <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionExample">
                              <div class="card-body p-3">
                                 <?php foreach ($list_post as $page) : ?>
                                    <div class="form-check">
                                       <input name="PageId[]" class="form-check-input" type="checkbox" value="<?= $page->id; ?>" id="PageId<?= $page->id; ?>">
                                       <label class="form-check-label" for="PageId<?= $page->id; ?>">
                                          <?= $page->title; ?>
                                       </label>
                                    </div>
                                 <?php endforeach; ?>
                                 <div class="my-3">
                                    <button name="AddPage" class="btn btn-sm btn-success form-control">Thêm</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card mb-0">
                           <div class="card-header" id="headingCustom">
                              <strong data-toggle="collapse" data-target="#collapseCustom" aria-expanded="true" aria-controls="collapseCustom">
                                 Tuỳ biến liên kết
                              </strong>
                           </div>
                           <div id="collapseCustom" class="collapse" aria-labelledby="headingCustom" data-parent="#accordionExample">
                              <div class="card-body p-3">
                                 <div class="mb-3">
                                    <label>Tên menu</label>
                                    <input type="text" name="name" class="form-control">
                                 </div>
                                 <div class="mb-3">
                                    <label>Liên kết</label>
                                    <input type="text" name="link" class="form-control">
                                 </div>
                                 <div class="mb-3">
                                    <button name="AddCustom" class="btn btn-sm btn-success form-control">Thêm</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-9">
                     <table class="table table-bordered" id="mytable">
                        <thead>
                           <tr>
                              <th class="text-center" style="width:30px;">
                                 <input type="checkbox">
                              </th>
                              <th>Tên menu/Liên kết</th>
                              <th>Vị trí</th>
                              <th>Sắp xếp</th>
                              <th>Level</th>
                              <th>Ngày tạo</th>
                              <th>ID</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (count($list_menu) > 0) : ?>
                              <?php foreach ($list_menu as $menu) : ?>
                                 <tr class="datarow">
                                    <td>
                                       <input type="checkbox">
                                    </td>
                                    <td>
                                       <div class="name">
                                          <?= $menu->name; ?>
                                       </div>
                                       <div class="link">
                                          <?= $menu->link; ?>
                                       </div>

                                    </td>
                                    <td>
                                       <div class="position">
                                          <?= $menu->position; ?>
                                       </div>
                                       <div>
                                          <?php if ($menu->status == 1) : ?>
                                             <a href="index.php?option=menu&cat=status&id=<?= $menu->id; ?>" class="btn 
                                       btn-success btn-xs">
                                                <i class="fas fa-toggle-on"></i>
                                             </a>
                                          <?php else : ?>
                                             <a href="index.php?option=menu&cat=status&id=<?= $menu->id; ?>" class="btn 
                                       btn-danger btn-xs">
                                                <i class="fas fa-toggle-off"></i>
                                             </a>
                                          <?php endif; ?>
                                          <a href="index.php?option=menu&cat=edit&id=<?= $menu->id; ?>" class="btn btn-primary btn-xs">
                                             <i class="fas fa-edit"></i>
                                          </a>
                                          <a href="index.php?option=menu&cat=show&id=<?= $menu->id; ?>" class="btn btn-info btn-xs">
                                             <i class="fas fa-eye"></i>
                                          </a>
                                          <a href="index.php?option=menu&cat=delete&id=<?= $menu->id; ?>" class="btn btn-danger btn-xs">
                                             <i class="fas fa-trash"></i>
                                          </a>
                                       </div>
                                    </td>
                                    <td><?= $menu->sort_order; ?></td>
                                    <td><?= $menu->level; ?></td>
                                    <td><?= $menu->created_at; ?></td>
                                    <td><?= $menu->id; ?></td>
                                 </tr>
                              <?php endforeach; ?>
                           <?php endif; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>