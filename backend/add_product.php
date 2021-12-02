<?php
require_once 'connect.php';

if(isset($_POST['add'])){
  $pro_id = $_POST['pro_id'];
  $pro_name = $_POST['pro_name'];
  $price = $_POST['price'];
  $qty = $_POST['qty'];
  $filename=$_FILES['pro_pic']['name'];
  $tmp_name=$_FILES['pro_pic']['tmp_name'];
  
  if( $pro_id == '' || $pro_name == '' || $price == '' || $qty == '' ){
    echo "<script>alert('คุณยังไม่ได้กรอกข้อมูล');</script>";
  }else{
    $old_data = mysqli_fetch_array($con->query("SELECT * FROM product"));
    if($old_data['pro_id'] == $pro_id){
      echo "<script>alert('รหัสสินค้านี้มีอยู่แล้ว')</script>";
  }else if($old_data['pro_name'] == $pro_name){
      echo "<script>alert('ชื่อสินค้ามีอยู่แล้ว')</script>";
  }else{
      if(move_uploaded_file($tmp_name,"product/".$filename))
  $sql = "INSERT INTO product VALUES('$pro_id','$pro_name','$price','$qty','$filename')";
  $result = $con->query($sql);
  if(!$result){
    echo "<script>alert('ไม่สามารถบันทึกขัอมูลได้');</script>";
  }else{
    echo "<script>window.location.href='index.php?page=product'</script>";
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
        <h1>เพิ่มข้อมูลสินค้า</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
          <section class="content container">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
                  <br>
                <div class="card-body p-1">
                  <div class="row">
                    <div class="col-md-1"></div>
                      <div class="col-md-10">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" role="form">
                            <div class="form-group">
                                <label>รหัสสินค้า</label>
                                <input type="text" class="form-control" placeholder="รหัสสินค้า"name="pro_id">
                            </div>
                            <div class="form-group">
                                <label>ชื่อสินค้า</label>
                                <input type="text" class="form-control" placeholder="ชื่อสินค้า" name="pro_name">
                            </div>
                            <div class="form-group">
                                <label>ราคาสินค้า</label>
                                <input type="text" class="form-control" placeholder="ราคาสินค้า" name="price">
                            </div>
                            <div class="form-group">
                                <label>จำนวนสินค้า</label>
                                <input type="text" class="form-control" placeholder="จำนวนสินค้า" name="qty">
                            </div>
                            <div class="custom-file">
                                  <label for="" >รูปภาพ</label><label style="color: red;">*</label>
                                  <input type="file" class="form-control" name="pro_pic" onchange="readURL(this);">
                                  <!--<img id="blah" src="#" alt="your image" height="150" style="margin: 15px 0px 170px;">-->
                            </div>
                            
                            <button type="submit" class="btn btn-success btn-block" name="add">ADD</button>
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
