<?php
$url = "vote";
require_once 'header.php';
$log = $db->select('vote');
 $date = date('Y-m-d H:i:s');
 $where_user = array(
    'user_id' => $_SESSION['user_id']
);
 $log_user = $db->selectwhere('users', $where_user);
 foreach($log_user as $row);


 if(isset($_GET['vote'])){
    if($row['vote_status'] == '1'){
        $fields = array(
            'user_id' => $_SESSION['user_id'],
            'vote_id' => $_GET['vote'],
            'score' => 1
        );
        $fields2 = array(
            'vote_status' => 0
        );
        $insert = $db->insert('score', $fields);
        $update = $db->update('users', $fields2, $where_user);
        if($insert){
            alert('โหวตเเล้วเรียบร้อย');
            redirect('report.php');
        }
    }else{
        alert('คุณได้โหวตไปเเล้ว');
        redirect('report.php');
    }
 }

?>

<body>
        <h2>การเลือกตั้ง</h2>
        <br>
        <br>
<div class="d-fixed">
    <?php foreach($log as $row){ 
        
        if($row['time_start'] > $date){
            $status = 'ยังไม่ได้เริ่มการโหวต';
        }elseif($row['time_end'] < $date){
            $status = 'การโหวตสิ้นสุดเเล้ว';
         }else{
        $status = "<a class='btn-full' href='?vote={$row['vote_id']}'>โหวต</a>";
         }
        ?>
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
        <?php
        echo $status;
        ?>
        </div>
        </div>
        <?php } ?>
        </div>
</body>
</html>