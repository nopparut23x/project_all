<?php
$url = "vote";
require_once 'header.php';
$where = array(
    'vote_id' => $_GET['id']
);
$log = $db->selectwhere('vote', $where);
foreach($log as $row);
if(isset($_POST['vote_number'])){
        if(!empty($_FILES['img']['name'])){
            $file = $db->upload($_FILES['img'], $path = "assets/img");
        }else{
            $file = $row['img'];
        }
        $fields = array(
            'img' => $file,
            'vote_number' => $_POST['vote_number'],
            'fullname' => $_POST['fullname'],
            'policy' => $_POST['policy'],
            'time_start' => $_POST['time_start'],
            'time_end' => $_POST['time_end'],
        );
        $log2 =$db->update('vote', $fields, $where);
        if($log2){
            alert('เเก้ไขการเลือกตั้งเรียบร้อย');
            redirect('vote.php');
        }
    }
?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-singlebox">
    <h2>เเก้ไขการเลือกตั้ง</h2>
    <form method="post" enctype="multipart/form-data">
        <center>
            <input type="file" name="img">
        </center>
        <p>เบอร์</p>
        <input type="number" name="vote_number" placeholder="เบอร์" value="<?php echo $row['vote_number'] ?>" required>
        <p>ชื่อพรรค</p>
        <input type="text" name="fullname" placeholder="ชื่อพรรค" value="<?php echo $row['fullname'] ?>" required>
        <p>นโยบาย</p>
        <input type="text" name="policy" placeholder="นโยบาย" value="<?php echo $row['policy'] ?>" required>
        <p>เวลาเริ่มเลือกตั้ง</p>
        <input type="datetime-local" name="time_start" value="<?php echo $row['time_start'] ?>"  required>
        <p>เวลาสิ้นสุดเลือกตั้ง</p>
        <input type="datetime-local" name="time_end" value="<?php echo $row['time_end'] ?>"  required>
        <br><br>
        <button class="btn-full" type="submit">
            ลงทะเบียนเลือกตั้ง
        </button>
    </form>
    </div>
        </div>
    </div>
</body>
</html>