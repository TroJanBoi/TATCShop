<?php
$menu = "index";
include 'connect.php';
$sql = "SELECT * FROM orders";
$result = $con->query($sql);
//isset( $_POST['id'] ) ? $user_id = $_POST['id'] : $user_id = "";
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid"> 
    <h1><i class="nav-icon fas fa-address-card"></i>จัดการการสั่งซื้อ</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header card-navy card-outline">
        <div align="right"> 
        <a href="index.php?page=add_member" class="btn btn-success btn-xs">      
            <i class="fa fa-user-plus"></i> เพิ่มข้อมูล สมาชิก
          </a>
          <a href="index.php?page=add_many" class="btn btn-success btn-xs">      
            <i class="fa fa-user-plus"></i> เพิ่มข้อมูลสมาชิกหลายคน
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
                <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">ลำดับที่</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">รหัสคำสั่งซื้อ</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">รหัสสมาชิก</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">วันที่สั่งซื้อ</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะ</th>
                </tr>
              </thead>
              
              <tbody>
              <?php
                 $i = 1;   
                   while($row = mysqli_fetch_array($result))
                   {                
                ?>
                    <tr>
                      <td><?php echo $i;$i++;?></td>
                      <td>
                        <a href="index.php?page=order_detail&order_id=<?php echo $row['order_id']?>"><?php echo $row['order_id'] ?></a>
                      </td>
                      <td><?php echo $row['id'] ?></td>
                      <td><?php echo date_th($row['date']) ?></td>
                      <td><?php echo $row['status'] ?></td>
                      
                      <td>           
                        <a class="btn btn-warning btn-xs" href="edit_member.php?id=<?php echo $row['id']?>" >
                          <i class="fas fa-pencil-alt">
                          </i>
                        </a>
                        <a class="btn btn-danger btn-xs" href="del_member.php?id=<?php echo $row['id']?>">
                          <i class="fas fa-trash-alt">
                          </i> 
                        </a>
                      </td>
                    </tr>
                    <?php
                    $i++;
                   }
                ?>
              </tbody>
            </table>
          </div>
          <div class="col-md-1"></div>
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