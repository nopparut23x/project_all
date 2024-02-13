<?php
$url = "vote";
require_once 'header.php';
if(isset($_POST['vote_number'])){
    $where = array(
        'vote_number' => $_POST['vote_number'],
    );
    $log = $db->selectwhere('vote', $where);
    if(!empty($log[0])){
        alert('มีเบอร์เลือกตั้งนี้เเล้ว');
        redirect('vote_add.php');
    }else{
        if(!empty($_FILES['img']['name'])){
            $file = $db->upload($_FILES['img'], $path = "assets/img");
        }
        $fields = array(
            'img' => $file,
            'vote_number' => $_POST['vote_number'],
            'fullname' => $_POST['fullname'],
            'policy' => $_POST['policy'],
            'time_start' => $_POST['time_start'],
            'time_end' => $_POST['time_end'],
        );
        $log2 =$db->insert('vote', $fields);
        if($log2){
            alert('เพิ่มการเลือกตั้งเรียบร้อย');
            redirect('vote.php');
        }
    }
}

?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-singlebox">
    <h2>เพิ่มการเลือกตั้ง</h2>
    <form method="post" enctype="multipart/form-data">
        <center>
            <input type="file" name="img" required>
        </center>
        <p>เบอร์</p>
        <input type="number" name="vote_number" placeholder="เบอร์" required>
        <p>ชื่อพรรค</p>
        <input type="text" name="fullname" placeholder="ชื่อพรรค" required>
        <p>นโยบาย</p>
        <input type="text" name="policy" placeholder="นโยบาย" required>
        <p>เวลาเริ่มเลือกตั้ง</p>
        <input type="datetime-local" name="time_start"  required>
        <p>เวลาสิ้นสุดเลือกตั้ง</p>
        <input type="datetime-local" name="time_end"  required>
        <br><br>
        <button class="btn-full" type="submit">
            ลงทะเบียนเลือกตั้ง
        </button>
    </form>
    </div>
        </div>
    </div>
</body>
</body>
</html>