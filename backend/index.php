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
        default:
          include "member.php";
    }
  ?>
</div>
</div>