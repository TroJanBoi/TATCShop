<?php
    session_start();
    if($_POST){
        include 'connect.php';
        $id = $_SESSION['id'];
        $date = date("Y-m-d");
        $sql = "INSERT INTO orders VALUES('','$id','$date','')";
        $result = $con->query($sql);
        if($result){
            $order_id = $con->insert_id;
            for($i=0; $i < count($_POST['qty']);$i++){
                $qty = $_POST['qty'][$i];
                $price = $_POST['price'][$i];
                $pro_id = $_POST['pro_id'][$i];
                $sql2="INSERT INTO order_list VALUES('$order_id','$pro_id','$qty','$price')";
                $result2 = $con->query($sql2);
            }
            unset($_SESSION['cart']);
            unset($_SESSION['qty']);
            // echo "<script>
            //     alert('สั่งซื้อสินค้าสำเร็จ');
            //     window.location.href='index.php';
            //     </script>";
            header('location:index.php?page=payment');
        }else{
            echo "<script>alert('ไม่สามารถทำรายการนี้ได้');</script>"; 
        }
    }
?>