<?php
    include 'connect.php';
    $pro_id=isset($_GET['pro_id']) ? $_GET['pro_id'] : "";
    $count=isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    if(isset($_SESSION['qty'])){
        $qty=0;
        foreach($_SESSION['qty'] as $item){
            @$qty=$qty+$item;
        }
    }else{
        $qty=0;
    }
    if(isset($_SESSION['cart']) and $count > 0){
        $pro_ids = "";
        foreach($_SESSION['cart'] as $pro_id){
            $pro_ids=$pro_ids . $pro_id . ",";
        }
        $inputPro_id=rtrim($pro_ids,",");
        $sql="SELECT * FROM product WHERE pro_id in ({$inputPro_id})";
        $result=$con->query($sql);
        $num_rows=mysqli_num_rows($result);        
    }else{
        $num_rows=0;
    }
    if($num_rows==0){
        echo "ไม่มีสินค้าอยู่ในตะกร้า";
    }else{
?>
<div class="container">    
    <table class="table table-striped">
    <form action="updatecart.php" method="POST">
        <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>จำนวน</th>
            <th>ราคาต่อหน่วย</th>
            <th>จำนวนเงิน</th>
            <th>การจัดการ</th>
        </tr>
        <?php
            $i=0;
            $total_price=0;
            while($row=mysqli_fetch_array($result)){
                $key=array_search($row['pro_id'],$_SESSION['cart']);
                $total_price= $total_price+($row['price'] * $_SESSION['qty'][$key]);
        ?>
        <tr>
            <td><?php echo $row['pro_id']?></td>
            <td><?php echo $row['pro_name']?></td>
            <td>
                <input type="text" class="form-control" value="<?php echo $_SESSION['qty'][$key]?>" name="qty[<?php echo $i?>]">
                <input type="hidden" name="arr_key_<?php echo $i?>" value="<?php echo $key?>">
            </td>
            <td><?php echo $row['price']?></td>
            <td><?php echo $row['price']*$_SESSION['qty'][$key]?></td>
            <td>
                <a href="removecart.php?pro_id=<?php echo $row['pro_id']?>" class="btn btn-danger">ลบ</a>
            </td>
        </tr>
        <?php 
            $i++;
        }        
        ?>
        <tr>
            <td colspan="6">
                <h4>จำนวนเงินรวมทั้งหมด <?php echo number_format($total_price)?> บาท</h4>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <a href="index.php?page=order" class="btn btn-primary">ชำระเงิน</a>
            </td>
        </tr>
        </form>
    </table>    
</div>
<?php } ?>