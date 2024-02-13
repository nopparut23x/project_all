<?php
$url = "manager_user";
require_once 'header.php';
$where = array(
    'usg_status' => 'user'
);
$log = $db->selectwhere('users', $where);
if(isset($_GET['on'])){
$where = array(
    'user_id' => $_GET['on']
);
$fields = array(
    'status' => '1'
);
$update = $db->update('users', $fields, $where);
if($update){
    alert('ยกเลิกการระงับการใช้งานเรียบร้อย');
    redirect('manager_user.php');
}
}

if(isset($_GET['off'])){
    $where = array(
        'user_id' => $_GET['off']
    );
    $fields = array(
        'status' => 0
    );
    $update = $db->update('users', $fields, $where);
    if($update){
        alert('ระงับการใช้งานเรียบร้อย');
        redirect('manager_user.php');
    }
    }

    if(isset($_GET['reset'])){
        $where = array(
            'usg_status' => 'user'
        );
        $fields = array(
            'vote_status' => 1
        );
        $update = $db->update('users', $fields, $where);
        if($update){
            alert('รีเซ็ทสิทธิการโหวตเรียบร้อย');
            redirect('manager_user.php');
        }
        }
?>
<body>
    <h2>จัดการผู้ใช้งาน</h2>
    <a class="a-out" href="?reset=ture" onclick="return confirm('ต้องการรีเซ็ตสิทธิการโหวต')">รีเซ็ทสิทธิเลือกตั้ง</a>
    <br>
    <br>
<div class="d-fixed">
<?php foreach($log as $row){ ?>
    <div class="box-fixed boxsm">
        <div class="form-profilebox">
        <div class="img-center">
        <img src="<?php echo $row['profile'] ?>" >
        </div>
    <p><b>ชื่อ : </b><?php echo $row['fname'] ?></p>
    <p><b>นามสกุล : </b><?php echo $row['lname'] ?></p>
    <p><b>อีเมล : </b><?php echo $row['email'] ?></p>
    <p><b>ที่อยู่ : </b><?php echo $row['address'] ?></p>
    <p><b>เบอร์โทรศัพท์ : </b><?php echo $row['tell'] ?></p>
    <p><b>การโหวต : </b><?php echo $row['vote_status'] == '1'?"ยังไม่ได้โหวต":"โหวตเเล้ว";?></p>
    <br>
    <?php echo $row['status'] == '1'?"<a class='btn-single' href='?off={$row['user_id']}'>ระงับการใช้งาน</a>":"<a class='btn-single' href='?on={$row['user_id']}'>ยกเลิกการระงับเข้าใช้งาน</a>"; ?>
    </div>
    </div>
    <?php } ?>   
</div>
</body>
</html>