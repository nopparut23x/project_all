<?php
$url = "cart";
require_once 'header.php';
$where = array(
    'user_id' => $_SESSION['user_id'],
);
$user = $db->selectwhere('users', $where);
foreach($user as $rowuser);
$log = $db->selectwhere('cart', $where);
foreach($log as $input);
if(empty($log[0])){
    echo "<h2>ไม่มีรายการ</h2>";
    exit();
}
if(isset($_GET['del'])){
    $where = array(
        'cart_id' => $_GET['del']
    );
    $delete = $db->delete('cart', $where);
    if($delete){
        alert('ลบเรียบร้อย');
        redirect('cart.php');
    }
}

if(isset($_POST['pay'])){
    if($_POST['pay'] == '0'){
        $fields = array(
            'user_id' => $_SESSION['user_id'],
            'total' => $_POST['total'],
            'status' => '1',
            'status_review' => '0',
            'pay' => '0',
            'pay_file' => ''
        );
        $insert = $db->insert('orders', $fields);
        $insert_id = $db->db->insert_id;
        foreach($log as $items){
            $fields_items = array(
                'order_id' => $insert_id,
                'food_id' => $items['food_id'],
                'quantity' => $items['quantity'],
                'price_food' => $items['total_price']

            );
            $insert_order = $db->insert('order_items', $fields_items);
            $where_de = array(
                'user_id' => $items['user_id'],
            );
            $de = $db->delete('cart', $where_de);
        }
        if(isset($de)){
            $_SESSION['order_id'] = $insert_id;
            alert('สั่งซื่อเรียบร้อยรออาหารสักครู่');
            redirect('food.php');
        }
    }else{
        $fields = array(
            'user_id' => $_SESSION['user_id'],
            'total' => $_POST['total'],
            'status' => '1',
            'status_review' => '0',
            'pay' => '1',
            'pay_file' => ''
        );
        $insert = $db->insert('orders', $fields);
        $insert_id = $db->db->insert_id;
        foreach($log as $items){
            $fields_items = array(
                'order_id' => $insert_id,
                'food_id' => $items['food_id'],
                'quantity' => $items['quantity'],
                'price_food' => $items['total_price']

            );
            $insert_order = $db->insert('order_items', $fields_items);
            $_SESSION['order_id'] = $insert_id;
            $where_de = array(
                'user_id' => $items['user_id'],
            );
            $de = $db->delete('cart', $where_de);
        }
        header('Location:pay.php');
    }
}

?>
<body>
    
    <table>
<tr>
    <th>เมนูอาหาร</th>
    <th>จำนวน</th>
    <th>ราคา</th>
    <th>ยกเลิก</th>
</tr>
    <?php
$sum = 0;
foreach($log as $row){
    $where2 = array(
        'food_id' => $row['food_id']
    );
    $log2 = $db->selectwhere('food', $where2);
    
    foreach($log2 as $row2);
         $sum += $row['total_price'];
            ?>
                <tr>
        <td><?php echo $row2['food_name'] ?></td>
        <td><?php echo $row['quantity'] ?></td>
        <td><?php echo $row['total_price'] ?></td>
        <td><a class="btn-dodgerblue" href="?del=<?php echo $row['cart_id'] ?>">ยกเลิก</a></td>
        </tr>

    <?php  }  ?>
    <tr>
        <td>รวม</td>
        <td><?php echo $sum; ?></td>
    </tr>
    </table>
<div class="d-fixed" style="justify-content:center; margin-top:40px;">
    <div class="box-fixed boxset-form">
        <div class="form-style">
        <form method="post">
    <br>
    <br>
    <p><b>เบอร์โทร : </b><?php echo $rowuser['tell'] ?></p>
<p><b>ที่อยู่ : </b><?php echo $rowuser['address'] ?></p>
<a href="profile.php">เเก้ไขที่อยู่</a><br>
<br>
    <input type="hidden" name="total" value=<?php echo $sum; ?>>
    <select name="pay">
        <option value="0">เก็บเงินปลายทาง</option>
        <option value="1">ช่ำระเงินออนไลน์</option>
    </select>
    <br>
    <br>
    <button type="submit" onclick="return confirm('ต้องการสั่งซื้อ?')">
        สั่งซื้อ
    </button>
</form>
        </div>
    </div>
</div>

</body>
</html>