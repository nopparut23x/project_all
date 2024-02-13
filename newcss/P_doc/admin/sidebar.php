<?php
if(empty($_SESSION['user_id'])){
    header('Location:../');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial,sans-serif;
        }
        .sidebar {
            width: 20vw;
            height: 100vh;
            top:0;
            left: 0;
            position: fixed;
            background-color: dodgerblue;
        }
        .sidebar h2 {
            text-align: center;
            margin-top: 12px;
            color:white;
        }
        .sidebar h5 {
            text-align: center;
            margin-bottom: 12px;
            color:white;
        }
        .sidebar ul {
            padding: 0;
        }
        .sidebar li {
            list-style: none;
            margin: 6px;
        }
        .sidebar li a {
            text-decoration: none;
            color:white;
            display: block;
            padding: 24px 10px;
            border-radius: 3px;
        }
        .sidebar .btn-logout {
            text-align: center;
            background-color: white;
            color:dodgerblue;
        }
        .sidebar .btn-logout:hover {
            color:white;
        }
        .sidebar li a:hover {
            background-color: rgba(0,0,0,0.3);
        }
        .active {
            background-color: rgba(0,0,0,0.3);
        }
        .content {
            margin-left: 20vw;
            padding: 16px;
        }
        /* ------------------------------------------------- */
        .navbar {
            width: 100vw;
            background-color: dodgerblue;
        }
        .navbar strong {
            color:white;
            margin-right: 10px;
        }
        .navbar ul {
            display: flex;
            align-items: center;
            justify-content: center;
            gap:6px;
        }
        .navbar li {
            list-style: none;
        }
        .navbar li a {
            text-decoration: none;
            color:white;
            display: block;
            padding: 16px;
        }
        .navbar li a:hover {
            background-color: rgba(0,0,0,0.3);
        }
        .navbar .btn-logout{
            background-color: white;
            color:dodgerblue;
        }
        .navbar .btn-logout:hover {
            color:white;
        }
        .navbar {
            display: none;
        }
        @media screen and (max-width: 1032px) {
            .sidebar {
                display: none;
            }
            .content {
                margin: 0;
            }
            .navbar {
                display: block;
            }
            .navbar {
                font-size: 14px;
                text-align: center;
            }
        }
        
    </style>
</head>
<body>
    <div class="navbar">
        <ul>
            <strong>ระบบส่งเอกสารออนไลน์</strong>
            <li><a class="<?php echo $url == 'profile'?"active":""; ?>" href="profile.php">ข้อมูลส่วนตัว</a></li>
            <li><a class="<?php echo $url == 'user'?"active":""; ?>" href="user.php">จัดการผู้ใช้งาน</a></li>
            <li><a class="<?php echo $url == 'type'?"active":""; ?>" href="type.php">จัดการประเภทเอกสาร</a></li>
            <li><a class="<?php echo $url == 'department'?"active":""; ?>" href="department.php">จัดการเเผนกวิชา</a></li>
            <li><a class="<?php echo $url == 're_user'?"active":""; ?>" href="re_user.php">การส่งเอกสารให้บุคลากร</a></li>
            <li><a class="<?php echo $url == 're_department'?"active":""; ?>" href="re_department.php">การส่งเอกสารให้เเผนกวิชา</a></li>
            <li><a class="btn-logout" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบ?')">ออกจากระบบ</a></li>
        </ul>
    </div>
    <div class="sidebar">
        <h2>ระบบส่งเอกสารออนไลน์</h2>
        <h5>วิทยาลัยเทคนิคชัยภูมิ</h5>
        <ul>
            <li><a class="<?php echo $url == 'profile'?"active":""; ?>" href="profile.php">ข้อมูลส่วนตัว</a></li>
            <li><a class="<?php echo $url == 'user'?"active":""; ?>" href="user.php">จัดการผู้ใช้งาน</a></li>
            <li><a class="<?php echo $url == 'type'?"active":""; ?>" href="type.php">จัดการประเภทเอกสาร</a></li>
            <li><a class="<?php echo $url == 'department'?"active":""; ?>" href="department.php">จัดการเเผนกวิชา</a></li>
            <li><a class="<?php echo $url == 're_user'?"active":""; ?>" href="re_user.php">การส่งเอกสารให้บุคลากร</a></li>
            <li><a class="<?php echo $url == 're_department'?"active":""; ?>" href="re_department.php">การส่งเอกสารให้เเผนกวิชา</a></li>
            <li><a class="btn-logout" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบ?')">ออกจากระบบ</a></li>
        </ul>
    </div>
 
</body>
</html>