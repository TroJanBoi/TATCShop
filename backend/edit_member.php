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
    $selected_id = isset($_GET['id']) ? $_GET['id'] : '';
    $old_data=mysqli_fetch_array($con->query("SELECT * FROM member WHERE id = '$selected_id'"));
    if(isset($_POST['add'])){
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $name=$_POST['name'];
        $position=$_POST['position'];
        $upd_data=$con->query("UPDATE member SET email = '$email', password = '$pass', name = '$name', position = '$position' WHERE id = '$selected_id' ");
        $old_data = mysqli_fetch_array($con->query("SELECT * FROM user"));
        if(!$upd_data){
            echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');window.history.back();</script>";
        }else{
            //header('location:employee.php'); redirec php
            echo "<script>window.location.href='index.php?page=member';</script>";
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
                <h3 class="card-title">Edit member</h3>
              </div>
                  <br>
                <div class="card-body p-1">
                  <div class="row">
                    <div class="col-md-1"></div>
                      <div class="col-md-10">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" role="form">
                            <div class="form-group">
                                <label>email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $old_data['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="<?php echo $old_data['password'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Namel</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $old_data['name'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <select class="form-control" name="position" >
                                  <option value="<?php echo $old_data['position'] ?>"><?php echo $old_data['position'] ?></option>
                                  <option value="admin">Admin</option>
                                  <option value="staff">Staff</option>
                                </select>
                            </div>
                            <div class="custom-file">
                                  <label for="" >รูปภาพ</label><label style="color: red;">*</label>
                                  <input type="file" class="form-control" name="mc_img" id="mc_img" onchange="readURL(this);" /><br>
                                 <!--<img id="blah" src="#" alt="your image" width="50%" />--> 
                            </div>
                            <button type="submit" class="btn btn-success btn-block" name="add">Regis</button>
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
