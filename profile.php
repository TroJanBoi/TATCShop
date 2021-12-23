<?php
    include 'connect.php';
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM member WHERE id = '$id'";
    $result = $con->query($sql);
    $old_data=mysqli_fetch_array($result);
?>

<div class="container mt-5 w-50">
    <div class="card">
        <div class="card-header bg-warning">
            <h5>ข้อมูลบัญชีผู้ใช้</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-1"></div>
                    <div class="col-md-10 mb-3">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" role="form">
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">รหัสนักศึกษา</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control-plaintext" name="id" value="<?php echo $old_data['id'] ?>" disabled>
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">อีเมล</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control-plaintext" name="email" value="<?php echo $old_data['email'] ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">รหัสผ่าน</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control-plaintext" name="password" value="<?php echo $old_data['password'] ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-control">ชื่อ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control-plaintext" name="name" value="<?php echo $old_data['name'] ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-control">ตำแหน่ง</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control-plaintext" name="position" value="<?php echo $old_data['position'] ?>" disabled>
                                </div>                        
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-control"></label>
                                <div class="col-sm-8">
                                    <a href="index.php?page=edit_member" class="btn btn-primary">แก้ไขข้อมูล</a>
                                </div>
                            </div>
                            <!-- <div class="custom-file">
                                <label for="" >รูปภาพ</label><label style="color: red;">*</label>
                                <input type="file" class="form-control" name="mc_img" id="mc_img" onchange="readURL(this);" /><br>
                                //<img id="blah" src="#" alt="your image" width="50%" /> 
                            </div> -->

                            
                        </div>
                        
                    <div class="col-md-1"></div>
                    </form>
            </div>
        </div>
    </div>
</div>