<?php
$url = "vote";
require_once 'header.php';
$log = $db->select('vote');
$date = date("Y-m-d H:i:s");
if(isset($_GET['del'])){
    $where = array(
        'vote_id' => $_GET['del'],
    );
    $delete = $db->delete('vote', $where);
    if($delete){
        alert('ลบการเลือกตั้งเรียบร้อย');
        redirect('vote.php');
    }
}
?>
<body>
    <h2>การเลือกตั้ง</h2>
    <a class="a2-btn" href="vote_add.php">เพิ่มการเลือกตั้ง</a>
    <br>

    <div class="d-fixed">
<?php
    foreach($log as $row){ 
        if($row['time_start'] > $date){
            $status = 'ยังไม่ได้เปิดการโหวต';
        }elseif($row['time_end'] < $date){
            $status = 'ปิดการโหวตเเล้ว';
        }else{
            $status = 'กำลังเปิดโหวต';
        }
        ?>
                <div class="box-fixed" style="width:340px">
        <div class="form-content">
        <div class="img-center" >
            <img src="<?php echo $row['img'] ?>" >
        </div>
        <br>
        <h2><b>เบอร์</b> <?php echo $row['number'] ?></h2>
        <p><b>ชื่อพรรค :</b><?php echo $row['party'] ?> </p>
        <p><b>ชื่อหัวหน้าพรรค :</b> <?php echo $row['name_boss'] ?></p>
        <p><b>นโยบาย :</b><?php echo $row['policy'] ?> </p>
        <p><b>เวลาเริ่มโหวต :</b><?php echo $row['time_start'] ?> </p>
        <p><b>เวลาปิดการโหวต :</b> <?php echo $row['time_end'] ?></p>
        <p><b><?php echo $status ?></b> </p>
        <br>
        <a class="a-btn" href="vote_edit.php?id=<?php echo $row['vote_id'] ?>">เเก้ไข</a>
      <br>
        <a class="a-btn" href="?del=<?php echo $row['vote_id'] ?>">ลบ</a>
        <br>
        <br>
    </div>
    </div>

        <?php } ?>
    </div>
</body>
</html>