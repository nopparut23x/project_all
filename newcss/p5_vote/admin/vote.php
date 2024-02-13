<?php
$url = "vote";
require_once 'header.php';
$log = $db->select('vote');
 $date = date('Y-m-d H:i:s');
 if(isset($_GET['del'])){
    $where = array(
        'vote_id' => $_GET['del'],
    );
    $delete = $db->delete('vote',  $where);
    $delete = $db->delete('score',  $where);
    if($delete){
        alert('ลบการเลือกตั้ง');
        redirect('vote.php');
    }
    }

?>

<body>
        <h2>จัดการเลือกตั้ง</h2>
        <br>
        <a class="a-out" href="vote_add.php">เพิ่มการเลือกตั้ง</a>
        <br>
        <br>
<div class="d-fixed">
    <?php foreach($log as $row){ ?>
        <div class="box-fixed boxsm">
            <div class="form-profilebox">


        <div class="img-noneradius">
        <img src="<?php echo $row['img'] ?>" width="300px" hegith="300px">
        </div>
        <h2><b>เบอร์ : </b><?php echo $row['vote_number']?></h2>
        <p><b>ชื่อพรรค : </b><?php echo $row['fullname']?></p>
        <p><b>นโยบาย : </b><?php echo $row['policy']?></p>
        <p><b>เวลาเริ่มเลือกตั้ง : </b><?php echo $row['time_start']?></p>
        <p><b>เวลาสิ้นสุด : </b><?php echo $row['time_end']?></p>
        <br>
        <div class="btn-between">
            
        <a href="vote_edit.php?id=<?php echo $row['vote_id'] ?>">เเก้ไข</a>
        <a href="?del=<?php echo $row['vote_id'] ?>">ลบ</a>
        </div>

        </div>
        </div>
        <?php } ?>
        </div>
</body>
</html>