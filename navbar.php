<?php
  $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
  if(isset($_SESSION['qty'])){
    $qty = 0;
    foreach($_SESSION['qty'] as $item){
      @$qty = $qty + $item;
    }
  }else{
    $qty = 0;
  }
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">TATCShop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->
      </ul>
      <?php
        if($id['id']==''){
      ?>
         <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link btn btn-warning text-dark" href="login.php">Login</a>
            </li>
         </ul>
        <?php   
            }else{
        ?>

     <ul class="navbar-nav">
     <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $id['name']?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="index.php?page=profile">บัญชีของฉัน</a></li>
            <li><a class="dropdown-item" href="index.php?page=myorder">คำสั่งซื้อ</a></li>
          </ul>
        </li>
        <!--
         <li class="nav-item">
            <a class="nav-link text-white"><//?php echo $id['name']?></a>
         </li>
          -->
         <li class="nav-item">
              <a href="index.php?page=cart" class="nav-link">
                ตระกร้าสินค้า <span class="text-warning"><?php echo $qty?></span>
              </a>
              
         </li>

         <li class="nav-item">
            <a class="nav-link btn btn-danger" href="logout.php">Logout</a>
         </li>
     </ul>
     <?php } ?>
    </div>
  </div>
</nav>