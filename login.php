<?php
    include 'backend/connect.php';
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        //$save_pass = md5($password);
        $chk_login =$con->query("SELECT * FROM member WHERE email = '$email' and password = '$password'");
        $row = mysqli_fetch_array($chk_login);
        $num_row = mysqli_num_rows($chk_login);
        if($num_row==1){
           
            header('location:index.php');
            session_start();
            $_SESSION['id'] = $row['id'];
        }else{
            echo "<script>alert('email Or Password ไม่ถูกต้อง')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>login</title>
</head>
<body>
    <div class="container w-25" style="margin-top:200px;">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Login
            </div>
            <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" >
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-success" name="submit">Login</button>
                <a href="register.php" class="btn btn-warning">Register</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>