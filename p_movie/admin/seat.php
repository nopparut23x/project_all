<?php
$url = 'movie';
require_once 'header.php'; 
$where = array(
    'movie_id' => $_GET['id']
);
$log = $db->selectwhere('seat', $where);

if(isset($_GET['del'])){
    $where = array(
        'seat_id' => $_GET['del']
    );
    $log = $db->delete('seat', $where);
    if($log){
        alert('ลบเรียบร้อย');
        redirect('seat.php');
    }
}
?>
<body>
    <br>
    <center>
        <img src="../assets/img/6597b5098a5ed.jpg" width="400px" height="600px">
    </center>
    <h1>ที่นั่งภาพยนตร์</h1>
    <br>
<div class="d-fixed" style="gap:58px;">
    <?php foreach($log as $row){ ?>
<div class="box-fixed boxset-form">
    <div class="form-style">
<center>
<h2><b>เลขที่นั่ง </b><?php echo $row['seat_number'] ?></h2>
<br>
<hr>
<br>
<h2><b>กลุ่มที่นั่ง </b><?php echo $row['seat_group'] ?></h2>
<p><b>สถานะการจอง </b><?php echo $row['status_seat'] == '0' ?"ว่าง":"ถูกจองเเล้ว"; ?><p>
</center>
<br>  
    </div>
    <a class="btn-yellow btn-w100" href="seat_edit.php?id=<?php echo $row['seat_id'] ?>&movie_id=<?php echo $_GET['id'] ?>">เเก้ไข</a>
        <br>
        <a class="btn-red btn-w100" href="?del=<?php echo $row['seat_id'] ?>">ลบ</a>
    </div>
        <?php } ?>
</div>  
    <br>
</body>
</html>