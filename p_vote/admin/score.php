<?php 
$url = "score";
require_once 'header.php'; 
$where = array(
    'user_id' => $_SESSION['user_id'],
);
$log1 = $db->selectwhere('users', $where);
foreach($log1 as $user);

$sql = "SELECT vote.vote_id, vote.vote_number, vote.time_start, vote.time_end , SUM(vote_score.score) AS sum_vote FROM vote
LEFT JOIN vote_score ON vote.vote_id = vote_score.vote_id
GROUP BY vote.vote_id ";
$log = mysqli_query($db->db, $sql);
$date = date("Y-m-d H:i:s" );

?>
<body>
<body>
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
    <h2>คะเเนน <?php echo $row['sum_vote']." เสียง" ?></h2>
    <br>
    <center>
    <p><b>เวลาเริ่มโหวต :</b><?php echo $row['time_start'] ?></p>
    <p><b>เวลาสิ้นสุด :</b><?php echo $row['time_end'] ?></p>
    <p><b>สถานะโหวต :</b><?php echo $status; ?></p>
    </center>
    <br><br>
     </div>
    </div>
    <?php } ?>
</div>
</body>
</html>
</body>
</html>