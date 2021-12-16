<?php
    session_start();
   $pro_id=isset($_GET['pro_id']) ? $_GET['pro_id'] : "";
   if($_POST){
       for($i=0;$i < count($_POST['qty']); $i++){
           $key=$_POST['arr_key_'.$i];
           $_SESSION['qty'][$key]=$_POST['qty'][$i];
           header('location:index.php?page=cart');
       }
   }else{
       if(!isset($_SESSION['cart'])){
           $_SESSION['cart']=array();
           $_SESSION['qty']=array();
       }
       if(in_array($pro_id,$_SESSION['cart'])){
            $key=array_search($pro_id,$_SESSION['cart']);
            $_SESSION['qty'][$key]=$_SESSION['qty'][$key]+1;
            header('location:index.php');
       }else{
           array_push($_SESSION['cart'],$pro_id);
           $key=array_search($pro_id,$_SESSION['cart']);
           $_SESSION['qty'][$key]=1;
           header('location:index.php');
       }
   }
?>