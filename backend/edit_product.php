<!-- http://fordev22.com/ -->
<?php include ("head.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
<!-- Site wrapper -->
<div class="wrapper">
  
  
  <?php include ("navbar.php"); ?>
  <?php include ("menu_l.php"); ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php
    
    include 'connect.php';
    $selected_id = isset($_GET['pro_id']) ? $_GET['pro_id'] : '';
    $old_data=mysqli_fetch_array($con->query("SELECT * FROM product WHERE pro_id = '$selected_id'"));
    if(isset($_POST['add'])){
        $pro_id=$_POST['pro_id'];
        $pro_name=$_POST['pro_name'];
        $price=$_POST['price'];
        $qty=$_POST['qty'];
        $filename=$_FILES['pro_pic']['name'];
        $tmp_name=$_FILES['pro_pic']['tmp_name'];
        if($pro_name == ''){
            echo "<script>alert('คุณยังไม่ได้กรอกข้อมูล');</script>";
        }else{
            if($filename !== ""){
                unlink("product/".$old_data['pro_pic']);
                move_uploaded_file($tmp_name,"product/".$filename);
                $upd_data=$con->query("UPDATE product SET pro_id = '$pro_id', pro_name = '$pro_name', price = '$price', qty = '$qty',pro_pic = '$filename' WHERE pro_id = '$selected_id' ");
            }elseif($filename == ''){
                $upd_data=$con->query("UPDATE product SET pro_id = '$pro_id', pro_name = '$pro_name', price = '$price', qty = '$qty' WHERE pro_id = '$selected_id' ");
            }
        }
        $old_data = mysqli_fetch_array($con->query("SELECT * FROM product"));
        if(!$upd_data){
            echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');window.history.back();</script>";
        }else{
            //header('location:employee.php'); redirec php
            echo "<script>window.location.href='index.php?page=product';</script>";
            //echo "<META HTTP-EQUIV = 'Refresh' CONTENT='0;URL=employee.php'>"; redirec html
    }
    }
   
    ?>

<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>แก้ไขข้อมูล</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
          <section class="content container">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
              </div>
                  <br>
                <div class="card-body p-1">
                  <div class="row">
                    <div class="col-md-1"></div>
                      <div class="col-md-10">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" role="form">
                            <div class="form-group">
                                <label>รหัสสินค้า</label>
                                <input type="text" class="form-control" name="pro_id" value="<?php echo $old_data['pro_id'] ?>">
                            </div>
                            <div class="form-group">
                                <label>ชื่อสินค้า</label>
                                <input type="text" class="form-control" name="pro_name" value="<?php echo $old_data['pro_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label>ราคา</label>
                                <input type="text" class="form-control" name="price" value="<?php echo $old_data['price'] ?>">
                            </div>
                            <div class="form-group">
                                <label>จำนวน</label>
                                <input type="text" class="form-control" name="qty" value="<?php echo $old_data['qty'] ?>">
                            </div>
                            <div class="custom-file">
                                  <label>รูปภาพ</label>
                                  <label style="color: red;">*</label>
                                  <input type="file" class="form-control" name="pro_pic" onchange="readURL(this);">
                                  
                                  <!--<img id="blah" src="#" alt="your image" height="150" style="margin: 15px 0px 170px;">-->
                            </div>
                            <button type="submit" class="btn btn-success btn-block" name="add">Edit</button>
                          </div>
                          
                      <div class="col-md-1"></div>
                      </form>
                  </div>
                </div>
              </div>
        </section>
          <!-- /.content -->
<?php include('footer.php'); ?>

<script>
  $(function () {
    $(".datatable").DataTable();
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // http://fordev22.com/
    // });
  });
</script>
  
</body>
</html>
<!-- http://fordev22.com/ -->


</div>
</div>
