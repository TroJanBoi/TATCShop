<?php
    //session_start();
    if(@$_SESSION['id']==''){
        echo "<script>window.location.href='login.php'</script>";
    }
    include 'backend/connect.php';
    $id = $_SESSION['id'];
    $pro_id = $_GET['pro_id'];
    $date=date('Y:M:d');
    $qty=1;
    $product = mysqli_fetch_array($con->query("SELECT * FROM Product Where pro_id  = '$pro_id'"));
    if(isset($_POST['select'])){
      /*
        $sql="INSERT INTO cart VALUES('','$id','$date','')";
        $result=$con->query($sql);
        $sql2="SELECT * FROM cart";
        $row = mysqli_fetch_array($con->query($sql2));
        $sql3="INSERT INTO cart_list VALUES('".$row['cart_id']."','$pro_id','1')";
        $result3 = $con->query($sql3);
      */
    }
?>
<div class="container">
    <table class="table table-strip mt-2">
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">       
             <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>จำนวน</th>
                <th>ราคาต่อหน่วย</th>
                <th>รวมเงิน</th>
            </tr>
            <tr>
                <td><?php echo $pro_id?></td>
                <td><?php echo $product['pro_name']?></td>
                <td><input type="text" value="1" name="qty"></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo number_format($qty * $product['price']) ?></td>
            </tr>
            <tr>
                <td colspan="5">
                <button type="submit" name="select" class="btn btn-success">เลือกซื้อสินค้าต่อ</button>
                <button type="submit" name="submit" class="btn btn-warning">ชำระเงืน</button>
                </td>
            </tr>
        </form>
    </table>
</div>
