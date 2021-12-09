<!--Product-->
<?php
        include 'backend/connect.php';
        $sql = "SELECT  * FROM Product";
        $result = $con->query($sql);
    ?>
    <div class="container">
            <div class="row row-cols-1 row-cols-md-5 g-4 mt-5">
                <?php while($row=mysqli_fetch_array($result)){ ?>
                <div class="col">
                    <div class="card h-100">
                    <img src="backend/product/<?php echo $row['pro_pic']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['pro_name']?></h5>       
                    </div>
                    <div class="row mb-1 p-2">
                        <div class="col-auto">
                        <p class="card-text text-danger fw-bold">฿<?php echo number_format($row['price'])?></p>
                        </div>
                    <div class="col-auto">
                        <a href="index.php?page=cart&pro_id=<?php echo $row['pro_id'] ?>" class="btn btn-warning">เพิ่มลงตระกร้าสินค้า</a>
                    </div>
                    </div>
                   
                    </div>
                </div>     
                <?php } ?>       
            </div>        
        </div>
