<?php
$url ="profile";
require_once 'header.php';
$where =array(
    'user_id' => $_SESSION['user_id'],
);
$log = $db->selectwhere('users', $where);
foreach($log as $row);
$where2 = array(
    'de_id' => $row['de_id']
);
$log2 = $db->selectwhere('department', $where2);
foreach($log2 as $row2);
?>
<body>
<div class="d-center">
    <div class="box-fixed" style="width:500px;">
        <div class="form-content">
        <div class="img-center">
    <center>
        <img src="<?php echo $row['profile'] ?>" style="width:200px; height:200px;">
    </center>
    </div>
    <p><b>ชื่อ : </b> <?php echo $row['fname'] ?></p>
    <p><b>นามสกุล : </b> <?php echo $row['lname'] ?></p>
    <p><b>อีเมล : </b> <?php echo $row['email'] ?></p>
    <p><b>ที่อยู่ : </b> <?php echo $row['address'] ?></p>
    <p><b>เบอร์โทรศัพท์ : </b> <?php echo $row['tell'] ?></p>
    <p><b>เเผนกวิชา : </b> <?php echo $row2['de_name'] ?></p>
    <br>
    <div style="display:flex; justify-content:center; gap:6px">
    <a class="btn" style="width:50%;" href="edit_profile.php">เเก้ไขข้อมูลส่วนตัว</a>
    <a class="btn" style="width:50%;" href="forgot.php">เเก้ไขรหัสผ่าน</a>
    </div>
        </div>
    </div>
    </div>
</body>
</html>