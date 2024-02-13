<?php
$url = "pay";
require_once 'header.php';
$log = $db->select('pay');
if(isset($_GET['del'])){
    $where = array(
        'pay_id' => $_GET['del']
    );
    $delete = $db->delete('pay', $where);
    if($delete){
        alert('ลบเรียบร้อย');
        redirect('pay.php');
    }
}
?>
<body>
    <h1>การบัญชีธนาคาร</h1>
    <a class="btn-dodgerblue" href="pay_add.php">เพิ่มบัญชีธนาคาร</a>
    <br>
    <br>
<div class="d-fixed">
    <?php foreach($log as $row){ ?>
    <div class="box-fixed">
        <div class="form-fixed">
    <img src="<?php echo $row['img'] ?>" width="200px" height="200px">
        <p><b>ชื่อ </b><?php echo $row['pay_name'] ?></p>
        <p><b>ชื่อธนาคาร </b><?php echo $row['bank'] ?></p>
        <p><b>เลขบัญชี </b><?php echo $row['bank_id'] ?></p>
        
        </div>
        <a class="btn-dodgerblue" href="pay_edit.php?id=<?php echo $row['pay_id'] ?>">เเก้ไข</a>
        <a class="btn-dodgerblue" href="?del=<?php echo $row['pay_id'] ?>">ลบ</a>
    </div>
        <?php } ?>
    
</div>
</body>
</html>