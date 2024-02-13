<?php
$url = "profile";
require_once 'header.php';
$where = array(
    'user_id' => $_SESSION['user_id'],
);
$log = $db->selectwhere('users', $where);
foreach($log as $row);
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form" style="width:500px">
            <div class="form-content">
            <h1>ข้อมูลส่วนตัว</h1>
    <div class="img-center">
    <center>
        <img src="<?php echo $row['profile'] ?>" width="200px" height="200px">
    </center>
    </div>
    <br>
    <p><b>ชื่อ : </b><?php echo $row['fname'] ?></p>
    <p><b>นามสกุล : </b><?php echo $row['lname'] ?></p>
    <p><b>อีเมล : </b><?php echo $row['email'] ?></p>
    <p><b>เบอร์โทรศัพท์ : </b><?php echo $row['tell'] ?></p>
    <p><b>ที่อยู่ : </b><?php echo $row['address'] ?></p>
    <br>
            <a class="btn" href="edit_profile.php">เเก้ไขข้อมูลส่วนตัว</a>
            <br>
            <a class="btn" href="forgot.php">เเก้ไขรหัสผ่าน</a>
            </div>
        </div>
    </div>
</body>
</html>