<?php
    include 'backend/connect.php';
    session_start();
    $id = @mysqli_fetch_array($con->query("SELECT * FROM member where id = '".$_SESSION['id']."'"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TATCShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="image/tatc-logo.icon" type="image/x-icon">
</head>
<body>
    <?php
        include 'navbar.php';
        include 'carousel.php';
        switch(@$_GET['page']){
            case 'cart':
                include 'cart.php';
                break;
            case 'register':
                include 'register.php';
                break;
            default:
                include 'product.php';
                break;
        }
    ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>