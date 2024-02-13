<?php
if(empty($_SESSION['user_id'])){
    header("Location:../");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../config/style.css">
</head>
<body>
    <div class="sidebar">
        <div class="text-header">
            <h2>ระบบเลือกตั้งออนไลน์</h2>
            <h6>วิทยาลัย เทคนิคชัยภูมิ</h6>
        </div>
        <ul>
            <li class="<?php echo $url == 'profile'?"active":""; ?>"><a href="profile.php"><img src="../config/img/admin.png" >&nbsp;<span>ข้อมูลส่วนตัว</span></a></li>
            <li class="<?php echo $url == 'manager_user'?"active":""; ?>"><a href="manager_user.php"><img src="../config/img/admin.png" >&nbsp;<span>จัดการข้อมูลผู้ใช้งาน</span></a></li>
            <li class="<?php echo $url == 'vote'?"active":""; ?>"><a href="vote.php"><img src="../config/img/admin.png" >&nbsp;<span>จัดการเลือกตั้ง</span></a></li>
            <li class="<?php echo $url == 'report'?"active":""; ?>"><a href="report.php"><img src="../config/img/admin.png" >&nbsp;<span>ผลการโหวต</span></a></li>
            <li class="btn-logout"><a onclick="return confirm('คุณต้องการออกจากระบบ?')" class="log-fix" href="logout.php" style=""><img class="img-hide" src="../config\img\logout.png" alt=""><span>ออกจากระบบ</span></a></li>
        </ul>
    </div>
</body>
</html>