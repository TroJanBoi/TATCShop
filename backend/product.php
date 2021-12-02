<?php
$menu = "index";
require_once 'connect.php';
$sql = "SELECT * FROM product ";
$result = $con->query($sql);
//isset( $_POST['pro_id'] ) ? $pro_id = $_POST['pro_id'] : $pro_id = "";
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid"> 
    <h1><i class="nav-icon fas fa-address-card"></i> จัดการข้อมูลสินค้า</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header card-navy card-outline">
        <div align="right"> 
        <a href="index.php?page=add_product" class="btn btn-success btn-xs">      
            <i class="fa fa-user-plus"></i> เพิ่มข้อมูลสินค้า
          </a>
          <a href="index.php?page=add_pro_many" class="btn btn-success btn-xs">      
            <i class="fa fa-user-plus"></i> เพิ่มข้อมูลสินค้าหลายรายการ
          </a>
        </div>
      </div>
      <br>
      <div class="card-body p-1">
        <div class="row">
          <div class="col-md-1">
            
          </div>
          <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row" class="info">
                <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">รหัสสินค้า</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ชื่อสินค้า</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ราคา</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">จำนวน</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รูปภาพ</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">การจัดการ</th>
                </tr>
              </thead>
              
              <tbody>
              <?php

                   while($row = mysqli_fetch_array($result))
                   {                
                ?>
                    <tr>
                      <td><?php echo $row['pro_id'] ?></td>
                      <td><?php echo $row['pro_name'] ?></td>
                      <td><?php echo $row['price'] ?></td>
                      <td><?php echo $row['qty'] ?></td>
                      <td><img src="product/<?php echo $row['pro_pic'] ?>" width="100"></td>
                      <td>           
                        <a class="btn btn-warning btn-xs" href="edit_product.php?pro_id=<?php echo $row['pro_id']?>" >
                          <i class="fas fa-pencil-alt">
                          </i>
                        </a>
                        <a class="btn btn-danger btn-xs" href="del_product.php?pro_id=<?php echo $row['pro_id']?>">
                          <i class="fas fa-trash-alt">
                          </i> 
                        </a>
                      </td>
                    </tr>
                    <?php
                   }
                ?>
                
              </tbody>
              
            </table>
            
          </div>
          <div class="col-md-1" >
            
          </div>
        </div>
      </div>
      
    </div>
    
    
    
  </div>
  <!-- /.col -->
</div>
</section>
<!-- /.content -->
<?php include('footer.php'); ?>
<script>
$(function () {
$(".datatable").DataTable();
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
http://fordev22.com/
"ordering": true,
"info": true,
"autoWidth": false,
});
});
</script>
</body>
</html>