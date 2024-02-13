<?php
$url = 'theater';

require_once 'header.php'; 
$log = $db->select('theater');
if(isset($_GET['del'])){
    $where = array(
        'theater_id' => $_GET['del']
    );
    $log = $db->delete('theater', $where);
    if($log){
        alert('ลบเรียบร้อย');
        redirect('theater.php');
    }

}
?>
<body>
    <a class= "btn-dodgerblueshort" href="theater_add.php">เพิ่มโรงฉายภาพยนตร์</a>
    <br>
    <h1>โรงฉายภาพยนตร์</h1>
    <br>
<div class="d-fixed">
    <?php foreach($log as $row){?>
        <div class="box-fixed boxset-form">
            <div class="form-style">
                <p><b>ชื่อโรงฉาย :</b><?php echo $row['theater_name'] ?></p>

            </div>
            <br>
            <a class="btn-yellow btn-w100" href="theater_edit.php?id=<?php echo $row['theater_id'] ?>">เเก้ไข</a>
        <br>
        <a class="btn-red btn-w100" href="?del=<?php echo $row['theater_id'] ?>">ลบ</a>
        </div>
    <?php } ?>
</div>
</body>
</html>