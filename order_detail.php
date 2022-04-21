<?php
require_once 'DB/dbConnect.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $qr = mysqli_query($conn, "SELECT 
    p.name_product,
    p.price,
    o.qty
     FROM order_detail o JOIN products p ON o.id_sp = p.id WHERE o.id = $id");
}
?>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên sản phảm</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thành tiền</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $stt = 0;
        $sum = 0;
        while ($row = mysqli_fetch_assoc($qr)) {
            $stt++;
            $sum += $row['qty'] * $row['price'];
        ?>
            <tr>
                <th scope="row"><?php echo $stt ?></th>
                <td><?php echo $row['name_product'] ?></td>
                <td>$ <?php echo number_format($row['price']) ?></td>
                <td><?php echo $row['qty'] ?></td>
                <td>$ <?php echo number_format($row['price'] * $row['qty']) ?></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td style="font-size: 20px;">Tổng</td>
            <td style="color:orange;font-size: 16px;"> $<?php echo $sum ?></td>
        </tr>

    </tbody>
</table>
<a href="order.php"><button class="btn btn-back">Quay lại</button></a>
