<!-- http://fordev22.com/ -->
<?php include ("head.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
<!-- Site wrapper -->
<div class="wrapper">
  
  
  <?php include ("navbar.php"); ?>
  <?php include ("menu_l.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <?php
    switch(@$_GET['page']){
      case "member" :
        include "member.php";
        break;
      case "add_member":
        include "add_member.php";
        break;
      case "edit_member":
        include "edit_member.php";
        break;
      case "del_member":
        include "del_member.php";
        break;
      case "product":
        include "product.php";
        break;
      case "add_product":
        include "add_product.php";
        break;
        case "edit_product":
          include "edit_product.php";
          break;
      case "del_product":
        include "del_product.php";
        break;
      case "add_many":
        include "add_many.php";
        break;
      case "add_pro_many":
        include "add_pro_many.php";
        break;
      default:  include "member.php";
}
  ?>
</div>
</div>