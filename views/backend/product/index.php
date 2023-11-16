<?php

use App\Models\Product;

$list = Product::join('category', 'product.category_id', '=', 'category.id')
   ->join('brand', 'product.brand_id', '=', 'brand.id')
   ->where('product.status', '!=', 0)
   ->orderBy('product.created_at', 'desc')
   ->select("product.*", "brand.name as brand_name", "category.name as category_name")
   ->get();

?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả sản phẩm</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header">
               <div class="row">
                  <div div class="col-md-6">
                     <a href="index.php?option=product" class="btn btn-sm btn-primary">Tất cả</a>
                     <a href="index.php?option=product&cat=trash" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
                  </div>
                  <div div class="col-md-6 text-right">
                     <a href="index.php?option=product&cat=create" class="btn btn-sm btn-success">Thêm sản phẩm</a>
                  </div>
               </div>
               <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>
                  <table class="table table-bordered" id="mytable">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th class="text-center" style="width:80px;">Hình ảnh</th>
                           <th class="text-center">Tên sản phẩm</th>
                           <th class="text-center">Tên danh mục</th>
                           <th class="text-center">Tên thương hiệu</th>
                           <th class="text-center"> Ngày tạo</th>
                           <th class="text-center"> Chức năng</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if (count($list) > 0) : ?>
                           <?php foreach ($list as $item) : ?>
                              <tr class="datarow">
                                 <td class="text-center">
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                    <img class="img-fluid" src="../public/images/product/<?= $item->image; ?>" alt="<?= $item->image; ?>" style="width:70px; height:100px;">
                                 </td>
                                 <td class="text-center">
                                    <div class="name">
                                       <?= $item->name; ?>
                                    </div>
                                 </td>
                                 <td class="text-center"><?= $item->category_name; ?> </td>
                                 <td class="text-center"><?= $item->brand_name; ?> </td>
                                 <td class="text-center"><?= $item->created_at; ?></td>
                                 <td class="text-center">
                                    <?php if ($item->status == 1) : ?>
                                       <a href="index.php?option=product&cat=status&id=<?= $item->id; ?>" class="btn btn-success btn-xs">
                                          <i class="fas fa-toggle-on"></i>
                                       </a>
                                    <?php else : ?>
                                       <a href="index.php?option=product&cat=status&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                          <i class="fas fa-toggle-off"></i>
                                       </a>
                                    <?php endif; ?>
                                    <a href="index.php?option=product&cat=edit&id=<?= $item->id; ?>" class="btn btn-primary btn-xs m-2">
                                       <i class="fas fa-edit"></i>
                                       <a href="index.php?option=product&cat=show&id=<?= $item->id; ?>" class="btn btn-info btn-xs ">
                                          <i class="fas fa-eye"></i>
                                       </a>
                                       <a href="index.php?option=product&cat=delete&id=<?= $item->id; ?>" class="btn btn-danger btn-xs m-2">
                                          <i class="fas fa-trash"></i>
                                       </a>
                                 </td>
                              </tr>
                           <?php endforeach; ?>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>
            </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>