<?php
require_once 'connect.php';
if(isset($_POST['add'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $position = $_POST['position'];
  if( $email == '' || $password == '' || $name == '' || $position == '' ){
    echo "<script>alert('คุณยังไม่ได้กรอกข้อมูล');</script>";
  }else{
    $old_data = mysqli_fetch_array($con->query("SELECT * FROM user"));
    if($old_data['email'] == $email){
      echo "<script>alert('อีเมลนี้มีอยู่แล้ว')</script>";
  }else if($old_data['name'] == $name){
      echo "<script>alert('ชื่อนี้มีอยู่แล้ว')</script>";
  }else{
  $sql = "INSERT INTO user VALUES('','$email','$password','$name','$position')";
  $result = $con->query($sql);
  if(!$result){
    echo "<script>alert('ไม่สามารถบันทึกขัอมูลได้');</script>";
  }else{
    echo "<script>window.location.href='index.php?page=member'</script>";
  }
}
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
        <h1>เพิ่มข้อมูลสมาชิก</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
          <section class="content container">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add member</h3>
              </div>
                  <br>
                <div class="card-body p-1">
                  <div class="row">
                    <div class="col-md-1"></div>
                      <div class="col-md-10">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" role="form">
                            <div class="form-group">
                                <label>email</label>
                                <input type="email" class="form-control" placeholder="Enter email"name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Enter password" name="password">
                            </div>
                            <div class="form-group">
                                <label>Namel</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="name">
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <select class="form-control" name="position">
                                  <option value="">กรุณาเลือก</option>
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
