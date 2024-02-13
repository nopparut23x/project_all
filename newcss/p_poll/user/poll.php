<?php 
$url = "poll";
require_once 'header.php';
$where = array(
    'user_id' => $_SESSION['user_id'],
);
$log  = $db->selectwhere('poll', $where);
if(isset($_GET['del'])){
    $where3 = array(
        'poll_id' => $_GET['del']
    );
    $delete = $db->delete('poll', $where3);
    $delete = $db->delete('ask', $where3);
    $delete = $db->delete('ans', $where3);
    if($delete){
        alert('ลบเรียบร้อย');
        redirect('poll.php');
    }
}
?>
<body>
    <br>
<a class="a-btn" href="poll_add.php">เพิ่มเเบบสำรวจ</a>
    <h1>เเบบสำรวจ</h1>
<div class="d-fixed jcc">
<?php foreach($log as $row){ 
    $where2 = array(
        'type_id' => $row['type_id'],
    );
    $log2 = $db->selectwhere('type', $where2);
    foreach($log2 as $row2);
    ?>
    <div class="box">
        <div class="form-style">
    <div class="img-center">
    <img src="<?php echo $row['profile'] ?>" width="200px" height="200px">
    </div>
    <p><b>ชื่อเเบบสำรวจ :</b><?php echo $row['name'] ?></p>
    <p><b>เวลาที่สร้าง :</b><?php echo $row['time'] ?></p>
    <p><b>ประเภทเเบบสำรวจ :</b><?php echo $row2['type_name'] ?></p>
    
    </div>
    <br>
    <a class="btn" href="poll_edit.php?id=<?php echo $row['poll_id'] ?>">เเก้ไข</a>
    <br>
    <a class="btn" href="report.php?id=<?php echo $row['poll_id'] ?>">ดูรายงาน</a>
    <br>
    <a class="btn" href="?del=<?php echo $row['poll_id'] ?>">ลบ</a>
    <br>
    </div>
    <?php } ?>    
</div>
</body>
</html>