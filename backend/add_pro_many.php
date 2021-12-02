<?php
    include 'connect.php';
    if(isset($_POST['submit'])){
        move_uploaded_file($_FILES['img']['tmp_name'],$_FILES['img']['name']);
        $csv=fopen($_FILES['img']['name'],"r");
        while(($row = fgetcsv($csv,1000,",")) !== FALSE){
            $pro_id=$row[0];
            $pro_name=$row[1];
            $price=$row[2];
            $qty=$row[3];
            //$pro_pic=$row[4];
            $sql="INSERT INTO product VALUES('$pro_id','$pro_name','$price','$qty','')";
            $result=$con->query($sql);
        }
        fclose($csv);
        echo "<script>window.location.href='index.php?page=product'</script>";
    }

?>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <h1>เพิ่มข้อมูลสมาชิกหลายคน</h1>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Products</h3>
        </div>
        <br>
        <div class="card-body p-1 mb-3">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="custom-file mb-5">
                            <label for="">อัพโหลดไฟล์ csv </label><label style="color: red;">*</label>
                            <input type="file" class="form-control" name="img" onchange="readURL(this);">
                        </div>                        
                        <input type="submit" class="btn btn-success btn-block" value="บันทึกข้อมูล" name="submit">
                </div>
                </form>
                <div class="col-md-1"></div>

            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<?php include('footer.php'); ?>