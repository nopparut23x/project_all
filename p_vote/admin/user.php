<?php
$url = "user";
require_once 'header.php';
$where = array(
    'usg_status' => 'user'
);
$log = $db->selectwhere('users', $where);
if(isset($_GET['on'])){
    $fields = array(
        'status' => '1'
    );
     $where = array(
        'user_id' => $_GET['on']
     );
     $update = $db->update('users', $fields, $where);
     if($update){
        alert('อนุญาติเข้าใช้งาน');
        redirect('user.php');
     }
}
if(isset($_GET['off'])){
    $fields = array(
        'status' => '0'
    );
     $where = array(
        'user_id' => $_GET['off']
     );
     $update = $db->update('users', $fields, $where);
     if($update){
        alert('ระงับการใช้งานเรียบร้อย');
        redirect('user.php');
     }
}
if(isset($_GET['refech'])){
    $where = array(
        'usg_status' => 'user'
    );
    $fields = array(
        'status_vote' => '1' );
        $update = $db->update('users', $fields , $where);
        if($update){
            alert('รีเซ็ตสิทธิการโหวตเรียบร้อย');
            redirect('user.php');
        }
}

?>
<body>
    <a class="btn-dodgerblueshort" href="?refech=user" onclick="return confirm('คุณต้องการรีเซ็ตสิทธิเลือกตั้ง?')">รีเซ็ตสิทธิเลือกตั้ง</a>
    <br>
    <br>
    <h1>ผู้ใช้สิทธิเลือกตั้ง</h1>
<div class="d-fixed">
    <?php foreach($log as $row){ ?>
    <div class="box-fixed boxset-form">
        <div class="form-style">
        <div class="image">
        <img src="<?php echo $row['profile'] ?>" width="200px" height="200px">
        </div>
        <br>
    <p><b>ชื่อ :</b><?php echo $row['fname'] ?></p>
    <p><b>นามสกุล :</b><?php echo $row['lname'] ?></p>
    <p><b>อีเมล :</b><?php echo $row['email'] ?></p>
    <p><b>ที่อยู่ :</b><?php echo $row['address'] ?></p>
    <p><b>เบอร์โทร :</b><?php echo $row['tell'] ?></p>
    <p><b>สถานะโหวต :</b><?php echo $row['status_vote'] == '1'?"ยังไม่ได้โหวต":"โหวตเเล้ว"; ?></p>
    
    
    <br>
        </div>
        <?php echo $row['status'] == '1'?"<a class='btn-dodgerblue' href='?off={$row['user_id']}'>ระงับการเข้าใช้งาน</a>":"<a class='btn-dodgerblue' href='?on={$row['user_id']}'>อนุญาติเข้าใช้งาน</a>"; ?>
    </div>
    <?php } ?>
</div>
</body>
</html>