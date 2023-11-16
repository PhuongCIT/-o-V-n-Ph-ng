<?php

use App\Models\Category;


$list = category::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
$parent_id_html = "";

foreach ($list as $cat) {
    $parent_id_html .= "<option value ='$cat->id'>$cat->name</option>";
}

?>


<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=category&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <strong class="text-dark text-lg">TẤT CẢ DANH MỤC</strong>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="index.php?option=category" class="btn btn-danger btn-sm">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Về danh sách
                            </a>
                        </div>
                        <div class="col-md-6 text-right">
                            <button class="btn btn-sm btn-success" type="submit" name="THEM">
                                <i class="fa fa-save" aria-hidden="true"></i>
                                Thêm Danh Mục
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php require_once "../views/backend/message.php"; ?>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label>Tên danh mục (*)</label>
                                <input type="text" name="name" id="name" placeholder="Nhập tên danh mục" class="form-control" onkeydown="handle_slug(this.value);">
                            </div>
                            <div class="mb-3">
                                <label>Slug</label>
                                <input type="text" name="slug" id="slug" placeholder="Nhập slug" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Mô tả</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Danh mục cha (*)</label>
                                <select name="parent_id" class="form-control">
                                    <option value="0">none</option>
                                    <?= $parent_id_html; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Sắp Xếp</label>
                                <select name="sort_order" class="form-control">
                                    <option value="1">1</option>
                                </select>
                            </div>
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
    </div>
    </section>
    </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>