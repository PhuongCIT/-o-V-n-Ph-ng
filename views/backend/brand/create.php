<?php

use App\Models\Brand;

$list = Brand::where('status', '!=', 0)->get();
?>

<?php require_once '../views/backend/header.php'; ?>
<form action="index.php?option=brand&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <a href="index.php?option=brand" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-sm btn-success" type="submit" name="THEM">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php require_once "../views/backend/message.php"; ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label>Tên thương hiệu (*)</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="1">Xuất bản</option>
                            <option value="2">Chưa xuất bản</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require_once '../views/backend/footer.php'; ?>