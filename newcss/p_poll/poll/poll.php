<?php
$url = "poll";
require_once 'header.php';

$log  = $db->select('poll');
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
    <img src="<?php echo $row['profile'] ?>" >
    </div>
    <br>
    <hr>
    <br>
    <p><b>ชื่อเเบบสำรวจ :</b><?php echo $row['name'] ?></p>
    <p><b>เวลาที่สร้าง :</b><?php echo $row['time'] ?></p>
    <p><b>ประเภทเเบบสำรวจ :</b><?php echo $row2['type_name'] ?></p>
    </div>
    <br>
    <a class="btn" href="ask.php?id=<?php echo $row['poll_id'] ?>">ทำเเบบสำรวจ</a>
    <br>
    </div>
    <?php } ?>    
</div>
</body>
</html>