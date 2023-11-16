<?php
use App\Models\User;


$id = $_REQUEST['id'];
$customer =  User::find($id);
if($customer==null){
    header("location:index.php?option=customer");
}

?>

<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết </h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
               <div class="row">
               
                  Noi dung
                  <div class="col-md-11 text-right">
                  <a href="index.php?option=customer" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách khách hàng
                  </a>
                  </div>
               </div>
               <div class="card-body">
                  <table class="table table-bordered" id="mytable">
                     <thead>
                        <tr>
                       
                           <th>Tên trường</th>
                           <th>Giá trị</th>
                          
                        </tr>
                     </thead>
                     <tbody>

                           <tr>
                              <td>ID</td>
                               <td><?= $customer->id;?></td>
                           </tr>
                           <tr>
                              <td>name</td>
                               <td><?= $customer->name;?></td>
                           </tr>
                           <tr>
                              <td>email</td>
                               <td><?= $customer->email;?></td>
                           </tr>
                           <tr>
                              <td>phone</td>
                               <td><?= $customer->phone;?></td>
                           </tr>
                           <tr>
                              <td>username</td>
                               <td><?= $customer->username;?></td>
                           </tr>
                           <tr>
                              <td>password</td>
                               <td><?= $customer->password;?></td>
                           </tr>
                           <tr>
                              <td>address</td>
                               <td><?= $customer->address;?></td>
                           </tr>
                           <tr>
                           <tr>
                                 <td>image</td>
                                 <td><img class="img-fluid" src="../public/images/user/<?=$customer->image;?>" alt="<?=$customer->image;?>"></td>
                              </tr>
                           <tr>
                              <td>roles</td>
                               <td><?= $customer->roles;?></td>
                           </tr>
                           <tr>
                              <td>created_at</td>
                               <td><?= $customer->created_at;?></td>
                           </tr>
                           <tr>
                              <td>created_by</td>
                               <td><?= $customer->created_by;?></td>
                           </tr>
                           <tr>
                              <td>updated_at</td>
                               <td><?= $customer->updated_at;?></td>
                           </tr>
                           <tr>
                              <td>updated_by</td>
                               <td><?= $customer->updated_by;?></td>
                           </tr>
                           <tr>
                              <td>status</td>
                               <td><?= $customer->status;?></td>
                           </tr>

                    
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>

      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>