<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
   * {
        margin: 0;
        padding: 0;
        box-sizing:border-box;
        font-family: Arial,sans-serif;
    }
    .sidebar {
        width: 20vw;
        height: 100vh;
        background-color: ;
        top:0;
        left:0;
        position: fixed;
        background-color: dodgerblue;
    }
    .sidebar h2 {
        text-align: center;
        margin-top: 24px;
        font-size: 19px;
    }
    .sidebar h5 {
        text-align: center;
        margin-top: 3px;
        margin-bottom: 24px;
        font-size:16px;
    }
    .sidebar h2,h5 {
        color:white;
    }
    .sidebar ul {
       padding: 0; 
    }
    .sidebar li {
        list-style: none;
        margin-top: 6px;
        margin-left: 6px;
        margin-right: 6px;
    }
    .sidebar a {
        text-decoration: none;
        padding: 20px 12px;
        display: block;
        color:white;
        border-radius:3px;
    }
    .sidebar a:hover {
        background-color: rgba(0,0,0,0.3);
    }
    .sidebar .btn-logout {
        text-align: center;
        color:dodgerblue;
        background-color: white;
    }
    .sidebar .btn-logout:hover {
        background-color: rgba(0,0,0,0.3);
        color:white;
    }
    .active {
        background-color: rgba(0,0,0,0.3);
    }
    .content {
        margin-left: 20vw;
        padding: 16px;
    }
    .navbar {
        display: none;
    }
    .navbar {
        background-color: dodgerblue;
        color:white;
    }
    .navbar ul {
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        gap:6px;
    }
    .navbar li {
        list-style: none;
    }
    .navbar li a {
        text-decoration: none;
        color:white;
        display: block;
        padding: 12px;
    }
    .navbar li a:hover {
        background-color: rgba(0,0,0,0.3);
    }
    .navbar .btn-logout {
        text-align: center;
        color:dodgerblue;
        background-color: white;
    }
    .navbar .btn-logout:hover {
        background-color: rgba(0,0,0,0.3);
        color:white;
    }
    .navbar strong {
        text-align: center;
    }
    @media screen and (max-width: 1230px) {
        .sidebar {
            display: none;
        }
        .content {
            margin-top: 40px;
            margin-left: 0;
        }
        .navbar {
            display: block;
            margin-bottom:50px;
        }
        
    }
    @media screen and (max-width: 870px) {
        .navbar {
            font-size: 14px;
        }
    }
    @media screen and (max-width: 780px) {
        .navbar {
            font-size: 12px;
        }
    }
    @media screen and (max-width: 520px) {
        .navbar {
            font-size: 10px;
        }
    }
    </style>
</head>
<body>
<div class="navbar">
        <ul>
            <strong>ระบบสำรองที่นั่งโรงหนังออนไลน์</strong>
            <li><a class="<?php echo $url == 'profile'?"active":""; ?>" href="profile.php">ข้อมูลส่วนตัว</a></li>
            <li><a class="<?php echo $url == 'homepage'?"active":""; ?>" href="homepage.php">ภาพยนตร์</a></li>
            <li><a class="<?php echo $url == 'history'?"active":""; ?>" href="history.php">รายการจองที่นั่ง</a></li>
            <li><a class="btn-logout" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบ')" style="">ออกจากระบบ</a></li>
        </ul>
    </div>
    <div class="sidebar">
        <ul>
        <h2 style="">ระบบสำรองที่นั่งโรงหนังออนไลน์</h2>
            <h5 style="">วิทยาลัยเทคนิคชัยภูมิ</h5>
            <li><a class="<?php echo $url == 'profile'?"active":""; ?>" href="profile.php">ข้อมูลส่วนตัว</a></li>
            <li><a class="<?php echo $url == 'homepage'?"active":""; ?>" href="homepage.php">ภาพยนตร์</a></li>
            <li><a class="<?php echo $url == 'history'?"active":""; ?>" href="history.php">รายการจองที่นั่ง</a></li>
            <li><a class="btn-logout" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบ')" style="">ออกจากระบบ</a></li>
        </ul>
    </div>
</body>
</html>