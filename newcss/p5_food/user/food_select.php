<?php
$url = "food";
require_once 'header.php';
    $where_ty = array(
        'food_id' => $_GET['id']
    );
    $log = $db->selectwhere('food', $where_ty);
    foreach($log as $row);
        $where = array(
            'ca_id' => $row['ca_id'],
        );
        $log2 = $db->selectwhere('category', $where);
        foreach($log2 as $row2);


    if(isset($_POST['quantity'])){
        $sum = $_POST['quantity'] * $row['price_food'];
        $fields = array(
        'user_id' => $_SESSION['user_id'],
        'food_id' => $row['food_id'],
        'quantity' => $_POST['quantity'],
        'total_price' => $sum
    );
    $insert = $db->insert('cart', $fields);
    if($insert){
         alert('เพิ่มเมนูอาหารลงตะกร้าเรียบร้อย');
         redirect('cart.php');
    }
    }
?>
<body>
    <h1>เมนูอาหาร</h1>
<br>
<center>
    <?php 
        ?>
        <img src="<?php echo $row['img'] ?>" width="200px" height="200px">
        <p><b>เมนูอาหาร : </b> <?php echo $row['food_name'] ?></p>
        <p><b>ราคาอาหาร : </b> <?php echo $row['price_food'] ?></p>
        <p><b>ประเภทอาหาร : </b> <?php echo $row2['ca_name'] ?></p>
        <?php
        if($row['status'] == '1'){?>
        <p><b>สถานะอาหาร : </b>พร้อม</p>
     <?php   }else{?>
        <p><b>สถานะอาหาร : </b>วัตถุดิบไม่พร้อม</p>
      <?php  }
        ?>
        <form method="post">
            <p><b>จำนวน</b></p>
            <input type="number" name="quantity" required min="1" value="1">
            <br>
            <br>
            <button type="submit">
                สั่งซื้อ
            </button>
        </form>
        </center>
</body>
</html>