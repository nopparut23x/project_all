<?php 
$url = "vote";
require_once 'header.php'; 
$log = $db->select('vote');
$date = date("Y-m-d H:i:s" );
if(isset($_GET['del'])){
    $where = array(
        'vote_id' => $_GET['del']
    );
    $delete = $db->delete('vote', $where);
    if($delete){
        alert('ลบการเลือกตั้งเรียบร้อย');
        redirect('vote.php');
    }
}
?>
<body>
<body>
    <a class="btn-dodgerblueshort" href="vote_add.php" onclick="return confirm('คุณต้องการเพิ่มการเลือกตั้ง?')">เพิ่มการเลือกตั้ง</a>
    <h1>การเลือกตั้ง</h1>
<div class="d-fixed">
    <?php foreach($log as $row){ 
         if($date > $row['time_start']){
    if($date < $row['time_end']){
        $status = "กำลังเปิดให้โหวต";
    }else{
        $status = "สิ้นสุดการโหวต";
    }
 }else{
    $status = "ยังไม่ได้เริ่มการโหวต";
 }
        ?>
    <div class="box-fixed boxset-form">
        <div class="form-style">
    <h1>เบอร์ <?php echo $row['vote_number'] ?></h1>
    <p><b>นโยบาย :</b><?php echo $row['msg'] ?></p>
    <p><b>เวลาเริ่มโหวต :</b><?php echo $row['time_start'] ?></p>
    <p><b>เวลาสิ้นสุด :</b><?php echo $row['time_end'] ?></p>
    <p><b>สถานะโหวต :</b><?php echo $status; ?></p>
    
    <br>
        </div>
        <a class="btn-dodgerblue" href="vote_edit.php?id=<?php echo $row['vote_id'] ?>">เเก้ไข</a>
        <br>
    <a class="btn-dodgerblue" href="?del=<?php echo $row['vote_id'] ?>">ลบ</a>
    </div>
    <?php } ?>
</div>
</body>
</html>
</body>
</html>