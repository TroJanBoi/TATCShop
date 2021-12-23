<?php
    include 'connect.php';
    $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : "";
    $order = mysqli_fetch_array($con->query("SELECT * FROM orders WHERE order_id = '$order_id'"));
    $sql = "SELECT * FROM  order_list,product WHERE product.pro_id = order_list.pro_id and order_id ='$order_id'";
    $result = $con->query($sql);
    if(isset($_POST['upd_status'])){
        $status = $_POST['status'];
        $upd_status = $con->query("UPDATE orders SET status = '$status' WHERE order_id = '$order_id'");
        if($upd_status){
            echo "<script>window.location.href='index.php?page=order'</script>";
        }
    }
?>

<div class="container w-100" style="margin-top:100px;"> 
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="row">
                <div class="col-3">คำสั่งซื้อเลขที่ : <?php  echo $order_id?></div>
                <div class="col-3">รหัสสมาชิก : <?php echo $order['id'] ?></div>
                <div class="col-6">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="form-group row">
                            <label class="col-sm-4" for="">สถานะการสั่งซื้อ</label>
                            <div class="col-sm-8">
                                <select name="status" class="form-control">
                                    <option value=""><?php echo $order['status']?></option>
                                    <option value="กำลังจัดเตรียมสินค้า">กำลังจัดเตรียมสินค้า</option>
                                    <option value="ส่งสินค้าแล้ว">ส่งสินค้าแล้ว</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" class="btn btn-danger" name="upd_status" value="อัะเดทสถานะ">
                            </div>
                        </div>      
                    </form>        
                </div>
            </div>
        </div>
        <div class="card-body">
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