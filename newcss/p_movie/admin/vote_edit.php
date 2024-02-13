<?php 
$url = "vote";
require_once 'header.php';
$where = array(
    'vote_id' => $_GET['id']
 );
 $log = $db->selectwhere('vote', $where);
 foreach($log as $row);

if(isset($_POST['save'])){


    if(!empty($_FILES['img']['name'])){
        $file = $db->upload($_FILES['img'],$path = 'assets/img');
    }else{
        $file = $row['img'];
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
    $update = $db->update('vote', $fields , $where);
    if($update){
        alert("เพิ่มการเลือกตั้งเรียบร้อย");
        redirect('vote.php');
    }
 }

?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form" style="width:700px">
        <div class="form-register">
        <div class="img-center">
            <img src="../assets/img/party.png" width="200px">
        </div>
    <form method="post" enctype="multipart/form-data">
        <h2>เเก้ไขลงทะเบียน</h2>
        <center>
            <input type="file" name="img" >
        </center>
        <p>ชื่อพรรค</p>
        <input type="text" name="party" required placeholder="ชื่อ" value="<?php echo $row['party'] ?>">
        <p>ชื่อหัวหน้าพรรค</p>
        <input type="text" name="fullname" required placeholder="นามสกุล" value="<?php echo $row['name_boss'] ?>">
        <p>เบอร์เลือกตั้ง</p>
        <input type="number" name="number" min="1"  required  value="<?php echo $row['number'] ?>">
        <p>นโยบาย</p>
        <input type="text" name="policy" required placeholder="นโยบาย" value="<?php echo $row['policy'] ?>">
        <p>เวลาเริ่มโหวต</p>
        <input type="datetime-local" name="time_start" required  value="<?php echo $row['time_start'] ?>">
        <p>เวลาปิดการโหวต</p>
        <input type="datetime-local" name="time_end" required  value="<?php echo $row['time_end'] ?>">
        <br>
        <br>
        <button type="submit" name="save">
            ลงทะเบียน
        </button>
        <br>
    </form>
    </div>
    </div>
    </div>

</body>
</html>