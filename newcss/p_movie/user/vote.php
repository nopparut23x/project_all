<?php
$url = "vote";
require_once 'header.php';
$log = $db->select('vote');
$date = date("Y-m-d H:i:s");
$where = array(
    'user_id' => $_SESSION['user_id'],
  );
  $log_user = $db->selectwhere('users', $where);
  foreach($log_user as $row2);
if(isset($_GET['id'])){
    if($row2['vote_status'] == '0'){
        alert('คุณโหวตไปเเล้ว');
        redirect('score_vote.php');
    }else{
        $fields = array(
            'user_id' => $_SESSION['user_id'],
            'vote_id' => $_GET['id'],
            'score' => 1,
        );
         $log2 = $db->insert('score', $fields);
         $update = $db->update('users',['vote_status' => 0 ] ,$where);
         if($log2){
            alert('โหวตเรียบร้อย');
            redirect('score_vote.php');
         } 
    }
}
?>
<body>

    <h2>การเลือกตั้ง</h2>
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
     <h2><b>เบอร์เลือกตั้ง :</b> <?php echo $row['number'] ?></h2>
        <p><b>ชื่อพรรค :</b><?php echo $row['party'] ?> </p>
        <p><b>ชื่อหัวหน้าพรรค :</b> <?php echo $row['name_boss'] ?></p>
        <p><b>นโยบาย :</b><?php echo $row['policy'] ?> </p>
        <p><b>เวลาเริ่มโหวต :</b><?php echo $row['time_start'] ?> </p>
        <p><b>เวลาปิดการโหวต :</b> <?php echo $row['time_end'] ?></p>
        <center>
            <br>
        <p style="color:dodgerblue"><b><?php echo $status ?></b> </p>
        </center>
       <?php if($status == 'กำลังเปิดโหวต'){ ?>
            <br>
        <a class="a-btn" onclick="return confirm('คุณต้องการโหวตเบอร์?')" href='?id=<?php echo $row['vote_id']  ?>'>โหวต</a>
            <?php } ?>
        <br>
        <br>
        </div>
        </div>

        <?php } ?>
</body>
</html>