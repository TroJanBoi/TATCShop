<?php
    session_start();
    $pro_id = isset($_GET['pro_id']) ? $_GET['pro_id'] : "";
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
        $_SESSION['qty'] = array();
    }
    $key=array_search($pro_id,$_SESSION['cart']);
    $_SESSION['qty'][$key]="";
    $_SESSION['cart']=array_diff($_SESSION['cart'],array($pro_id));
    header('location:index.php?page=cart');
?>