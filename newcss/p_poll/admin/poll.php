<?php 
$url = "poll";
require_once 'header.php';

$log  = $db->select('poll');
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
    <h1>เเบบสำรวจ</h1>
    <br>
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
    <a class="btn" href="report.php?id=<?php echo $row['poll_id'] ?>">ดูรายงาน</a>
    <br>
    <a class="btn" href="?del=<?php echo $row['poll_id'] ?>">ลบ</a>
    <br>
    </div>
    <?php } ?>    
    </div>
</body>
</html>