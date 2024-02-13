<?php
$url = 'profile';
require_once 'header.php';
$where = array(
    'user_id' => $_SESSION['user_id'],
);
$log = $db->selectwhere('users', $where);
foreach($log as $row);
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <h2>ช้อมูลส่วนตัว</h2>
            <br>
    <div class="img-center">
        <img src="<?php echo $row['profile'] ?>" width="300px" height="300px" style="border-radius:50%;">
    </div>
        <br>
    <br>
    <hr>
    <br>
    <p><b>ชื่อ :</b><?php echo $row['fname'] ?></p>
    <p><b>นามสกุล :</b><?php echo $row['lname'] ?></p>
    <p><b>อีเมล :</b><?php echo $row['email'] ?></p>
    <p><b>ที่อยู่ :</b><?php echo $row['address'] ?></p>
    <p><b>เบอร์โทรศัพท์ :</b><?php echo $row['tell'] ?></p>
    
            </div>
            <br>
            <a class="btn-dodgerblue btn-w100" href="edit_profile.php">เเก้ไขข้อมูลส่วนตัว</a>
            <br>
    <a class="btn-dodgerblue btn-w100" href="forgot.php">เเก้ไขรหัสผ่าน</a>
        </div>
    </div>
</body>
</html>