<?php
    include 'connect.php';
    $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; 
    if(isset($_SESSION['qty'])){
        $qty = 0;
        foreach($_SESSION['qty'] as $item){
            @$qty = $qty + $item;
        }
    }else{
        $qty = 0;
    }
    if(isset($_SESSION['qty']) and $count > 0){
        $pro_ids = "";
        foreach($_SESSION['cart'] as $pro_id){
            $pro_ids = $pro_ids . $pro_id.",";
        }
        $inputPro_id = rtrim($pro_ids,",");
        $sql = "SELECT * FROM product WHERE pro_id in ({$inputPro_id})";
        $result = $con->query($sql);
        $num_rows = mysqli_num_rows($result);
    }else{
        $count = 0;
    }
    if($count ==0){
        echo "ไม่มีสินค้าอยู่ในตระก้รา";
    }else{
    
?>
<div class="container mt-5">    
    <form action="updateorder.php" method="POST">
        <table class="table table-striped">
        
            <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>จำนวน</th>
                <th>ราคาต่อหน่วย</th>
                <th>จำนวนเงิน</th>
            </tr>
            <?php
                $no=0;
                $total_price=0;
                while($row=mysqli_fetch_array($result)){
                    $key=array_search($row['pro_id'],$_SESSION['cart']);
                    $total_price= $total_price+($row['price'] * $_SESSION['qty'][$key]);
            ?>
            <tr>
                <td><?php echo $row['pro_id']?></td>
                <td><?php echo $row['pro_name']?></td>
                <td>
                    <?php echo $_SESSION['qty'][$key];?>
                    <input type="hidden" name="qty[]" value="<?php echo $_SESSION['qty'][$key]; ?>">
                    <input type="hidden" name="pro_id[]" value="<?php echo $row['pro_id']; ?>">
                    <input type="hidden" name="price[]" value="<?php echo $row['price']; ?>">
                </td>
                <td><?php echo number_format($row['price'],2)?></td>
                <td><?php echo number_format($row['price']*$_SESSION['qty'][$key],2);?></td>
            </tr>
            <?php 
                $no++;
            }        
            ?>
            <tr>
                <td colspan="5" align="ringht">
                    <h4>จำนวนเงินรวมทั้งหมด <?php echo $total_price?> บาท</h4>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <a href="index.php?page=cart" class="btn btn-success">กลับไปหน้าตระกร้าสินค้า</a>
                    <button type="submit" class="btn btn-primary">ยืนยันการสั่งซื้อ</button>
                </td>   
            </tr>
        </table>    
    </form>
</div>
<?php } ?>