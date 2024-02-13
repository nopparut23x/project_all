<?php 
$url = "vote";
require_once 'header.php';
if(isset($_POST['save'])){
 $where = array(
    'number' => $_POST['number']
 );
 $log = $db->selectwhere('vote', $where);
 if(!empty($log[0])){
    alert('มีเบอร์เลือกตั้งนี้เเล้ว');
    redirect('vote_add.php');
 }else{
    if(!empty($_FILES['img']['name'])){
        $file = $db->upload($_FILES['img'],$path = 'assets/img');
    }
    $fields = array(
        'img' => $file,
        'party' => $_POST['party'],
        'number' => $_POST['number'],
        'policy' => $_POST['policy'],
        'time_start' => $_POST['time_start'],
        'time_end' => $_POST['time_end'],
        'name_boss' => $_POST['fullname'],
    );
    $insert = $db->insert('vote', $fields);
    if($insert){
        alert("เพิ่มการเลือกตั้งเรียบร้อย");
        redirect('vote.php');
    }
 }
}

?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form" style="width:700px">
        <div class="form-register">
        <form method="post" enctype="multipart/form-data">
        <div class="img-center">
            <img src="../assets/img/party.png" width="200px">
        </div>
        <h2>ลงทะเบียน</h2>
        <center>
            <input type="file" name="img" required>
        </center>
        <p>ชื่อพรรค</p>
        <input type="text" name="party" required placeholder="ชื่อ">
        <p>ชื่อหัวหน้าพรรค</p>
        <input type="text" name="fullname" required placeholder="นามสกุล">
        <p>เบอร์เลือกตั้ง</p>
        <input type="number" name="number" min="1"  required >
        <p>นโยบาย</p>
        <input type="text" name="policy" required placeholder="นโยบาย">
        <p>เวลาเริ่มโหวต</p>
        <input type="datetime-local" name="time_start" required >
        <p>เวลาปิดการโหวต</p>
        <input type="datetime-local" name="time_end" required >
        <br>
        <br>
        <button class="btn" type="submit" name="save">
            ลงทะเบียน
        </button>
        <br>
    </form>
</div>
</div>
</div>
</body>
</html>