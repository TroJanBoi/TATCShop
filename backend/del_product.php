<?php
    require_once 'connect.php';
    $selected_id = $_GET['pro_id'];
    
    $dir = "product/";
    $old_pic = "SELECT pro_pic FROM product WHERE pro_id = '". $pro_id ."'";
    $result = mysqli_query($con, $old_pic);
    if(mysqli_num_rows($result) > 0){
        $row_pic = mysqli_fetch_assoc($result);
        unlink($dir.$row_pic['pro_pic']);
    }
    $del_data = $con->query("DELETE FROM product WHERE pro_id = '$selected_id'");
    if(!$del_data){
        echo "<script>alert('ERROR : ไม่สามารถเพิ่มข้อมูลได้ กรุณาตรวจสอบข้อผิดพลาด');window.history.back();</script>";   
    }else{
        echo "<script>window.location.href='index.php';</script>";
    }
?>