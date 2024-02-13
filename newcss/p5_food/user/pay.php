<?php
$url = "cart";
require_once 'header.php';
$log = $db->select('pay');
if(!empty($_FILES['img']['name'])){
    $file = $db->upload($_FILES['img'], 'assets/img');
}
if(isset($_POST['save'])){
    $where = array(
        'order_id' => $_SESSION['order_id'],
    );
    $fields = array(
        'pay_file' => $file
    );
    $update = $db->update('orders', $fields, $where);
    if($update){
        alert('สั่งซื่อเรียบร้อยรออาหารสักครู่');
        redirect('food.php');
    }
}
?>
<body>
    <h1>การบัญชีธนาคาร</h1>
    <br>
    <br>
    <?php foreach($log as $row){ ?>
    <img src="<?php echo $row['img'] ?>" width="200px" height="200px">
        <p><b>ชื่อ </b><?php echo $row['pay_name'] ?></p>
        <p><b>ชื่อธนาคาร </b><?php echo $row['bank'] ?></p>
        <p><b>เลขบัญชี </b><?php echo $row['bank_id'] ?></p>
        <?php } ?>
        <form method="post" enctype="multipart/form-data">
            <p>เเนบหลักฐานการชำระเงิน</p>
            <input type="file" name="img" required>
            <br>
            <br>
            <button type="submit" name="save">
                สั่งซื้อ
            </button>
        </form>
</body> 
</html>