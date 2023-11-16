<?php

use App\Models\Banner;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$banner =  Banner::find($id);
if ($banner == null) {
   header("location:index.php?option=banner");
   MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'không tồn tại']);
}

$list = Banner::where([['status', '!=', 0], ['id', '!=', $id]])->get();
$html_sort_order = "";
foreach ($list as $item) {
   if ($item->sort_order  == $banner->sort_order) {
      $html_sort_order .= "<option selected value='" . $item->sort_order . "'>" . $item->sort_order . "</option>";
   } else {
      $html_sort_order .= "<option value='" . $item->sort_order . "'>" . $item->sort_order . "</option>";
   }
}
?>

<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=banner&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">CHỈNH SỬA BANNER</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=banner" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
               <button type="submit" class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  lưu [cập nhật]
               </button>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-9">
                     <div class="mb-3">
                        <label>Tên banner (*)</label>
                        <input type="text" name="name" value="<?= $banner->name; ?>" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Liên kết</label>
                        <input type="text" name="link" value="<?= $banner->link; ?>" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Hình ảnh</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="mb-3">
                        <label>Vị trí (*)</label>
                        <input name="position" value="<?= $banner->position; ?>" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Sắp xếp</label>
                        <select name="position" value="<?= $banner->sort_order; ?>" class="form-control">
                           <option value="<?= $banner->sort_order; ?>"><?= $banner->sort_order; ?></option>
                           <?= $html_sort_order; ?>
                        </select>
                     </div>

                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1" <?= ($banner->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                           <option value="2" <?= ($banner->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>