<?php
$url = "vote";
require_once 'header.php'; 
$where = array(
    'user_id' => $_SESSION['user_id'],
);
$log1 = $db->selectwhere('users', $where);
foreach($log1 as $user);

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
if(isset($_GET['vote'])){
    if($user['status_vote'] == '0'){
        alert('คุณได้ใช้สิทธิเลือกตั้งไปเเล้ว');
        redirect('score.php');
    }else{
        $fields = array(
            'user_id' => $_SESSION['user_id'],
            'vote_id' => $_GET['vote'],
            'score' => '1'
        );
        $up = array(
            'status_vote' => '0'
        );
        $insert = $db->insert('vote_score', $fields);
        $update = $db->update('users', $up, $where);
        if($update){
            alert('โหวตเรียบร้อย');
            redirect('score.php');
        }
    }
}
?>
<body>
<body>
    <h1>การเลือกตั้ง</h1>
    <br>
    <br>
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
<center>
<p><b>นโยบาย :</b><?php echo $row['msg'] ?></p>
        <p><b>เวลาเริ่มโหวต :</b><?php echo $row['time_start'] ?></p>
        <p><b>เวลาสิ้นสุด :</b><?php echo $row['time_end'] ?></p>
        <p><b>สถานะโหวต :</b><?php echo $status; ?></p>
</center>
    <br>
    <?php if($date > $row['time_start']){
    if($date < $row['time_end']){
?>
<?php
    }else{
        $status = "สิ้นสุดการโหวต";
    }
    }else{
    $status = "ยังไม่ได้เริ่มการโหวต";
    } ?>
    </div>
    <a class="btn-dodgerblue" onclick="return confirm('ต้องการโหวตเบอร์นี้?')" href="?vote=<?php echo $row['vote_id'] ?>">โหวต</a>
    </div>
    <?php } ?>
</div>
</body>
</html>
</body>
</html>