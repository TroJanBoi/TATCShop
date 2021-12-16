<?php
    include 'connect.php';
    if(isset($_POST['add'])){
        $id = $_POST['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        if( $id == '' || $email == '' || $password == '' || $name == '' || $position == '' ){
            echo "<script>alert('คุณยังไม่ได้กรอกข้อมูล');</script>";
        }else{
            $old_data = mysqli_fetch_array($con->query("SELECT * FROM member"));
            if($old_data['email'] == $email){
            echo "<script>alert('อีเมลนี้มีอยู่แล้ว')</script>";
        }else if($old_data['name'] == $name){
            echo "<script>alert('ชื่อนี้มีอยู่แล้ว')</script>";
        }else{
        $sql = "INSERT INTO member VALUES('$id','$email','$password','$name','$position')";
        $result = $con->query($sql);
                if(!$result){
                    echo "<script>alert('ไม่สามารถบันทึกขัอมูลได้');</script>";
                }else{
                    echo "<script>window.location.href='index.php?page=login'</script>";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<section class="content container mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Register</h3>
              </div>
                  <br>
                <div class="card-body p-1">
                  <div class="row">
                    <div class="col-md-1"></div>
                      <div class="col-md-10">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="form-group">
                                <label>ID student</label>
                                <input type="text" class="form-control" placeholder="Enter ID" name="id">
                            </div>
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
                                 
                            </div>
                            <img id="blah" src="#" alt="your image" width="50%">
                            <button type="submit" class="btn btn-success btn-block" name="add">Regis</button>
                          </div>
                          
                      <div class="col-md-1"></div>
                      </form>
                  </div>
                </div>
              </div>
        </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<!-- http://fordev22.com/ -->
