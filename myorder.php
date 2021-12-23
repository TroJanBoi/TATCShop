<?php
    include 'connect.php';
    $id = $_SESSION['id'];
    $orders = mysqli_fetch_array($con->query("SELECT * FROM orders WHERE id = '$id'"));
    if(!$orders){
        echo "<script>alert('คุณยังไม่มีรายการสินค้า');window.location.href='index.php'</script>";
    }
    $sql = "SELECT * FROM  order_list,product WHERE product.pro_id = order_list.pro_id";
    $result = $con->query($sql);
   
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-warning">
            <h5>ข้อมูลคำสั่งซื้อ</h5>
        </div>
        <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        รหัสคำสั่งซื้อ : <?php echo $orders['order_id'] ?>
                    </div>
                    <div class="col">
                        วันที่สั่งซื้อ : <?php echo date_th($orders['date'])?>
                    </div>
                    <div class="col">
                        สถานะการสั่งซื้อ :  <?php echo $orders['status']?>
                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ลำดับที่</th>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคาต่อหน่วย</th>
                        <th>ราคารวม</th>
                    </tr>
                    <?php
                        $i=1;
                        $total_price=0;

                        while($row=mysqli_fetch_array($result)){
                            $total_price = $total_price + ($row['price'] * $row['amount']);
                    ?>

                    <tr>
                        <th><?php echo $i;$i++;?></th>
                        <th><?php echo $row['pro_id'] ?></th>
                        <th><?php echo $row['pro_name']?></th>
                        <th><?php echo $row['amount']?></th>
                        <th><?php echo number_format($row['price'],2)?></th>
                        <th><?php echo number_format($row['price'] * $row['amount'],2)?></th>
                    </tr>
                    <?php } ?>
                    <tr class="fw-bold">
                        <td colspan ="5" align="center">จำนวนเงินทั้งหมด</td>
                        <td><?php echo number_format($total_price,2)?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>