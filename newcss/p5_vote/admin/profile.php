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
        <div class="box-fixed boxset-form">
            <div class="form-singlebox">
            <h2>ข้อมูลส่วนตัว</h2>
            <div class="img-center">
            <center>
                <img src="<?php echo $row['profile'] ?>" >
            </center>
            </div>
            <p><b>ชื่อ : </b><?php echo $row['fname'] ?></p>
            <p><b>นามสกุล : </b><?php echo $row['lname'] ?></p>
            <p><b>อีเมล : </b><?php echo $row['email'] ?></p>
            <p><b>ที่อยู่ : </b><?php echo $row['address'] ?></p>
            <p><b>เบอร์โทรศัพท์ : </b><?php echo $row['tell'] ?></p>
            <br>
            <div class="btn-between">
            <a href="edit_profile.php">เเก้ไขข้อมูลส่วนตัว</a>
            <a href="forgot.php">เเก้ไขรหัสผ่าน</a>
            </div>
            </div>
        </div>
    </div>
</body>
</html>