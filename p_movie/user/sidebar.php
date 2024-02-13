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
            font-family: Arial,Sans-serif;
        }
        .sidebar {
            width: 20%;
            height:100vh;
            top:0;
            left:0;
            position: fixed;
            background-color: #333;
        }
        .sidebar ul {
            padding:0;
            
        }
        .sidebar h2 {
            text-align: center;
            text-decoration: none;
            color:#fff;
            margin-top:24px;
        }
        .sidebar h5 {
            text-align: center;
            text-decoration: none;
            color:#fff;
            margin-bottom:24px;
            margin-top:3px;
        }
        .sidebar li {
            list-style: none;
            margin:6px 12px 6px 12px;
        }
        .sidebar a {
            text-decoration: none;
            color:#fff;
            display: block;
            padding:24px;
            border-radius:3px;
        }
        .sidebar a:hover {
            background-color: rgba(255,255,255,0.1);
        }
        .active {
            background-color: rgba(255,255,255,0.2);
        }
        .content {
            margin-left:20%;
            padding:16px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <h2>[ระบบสำรองที่นั่งโรงหนังออนไลน์]</h2>
            <h5>วิทยาลัยเทคนิคชัยภูมิ</h5>
            <li><a class="<?php echo $url == 'profile'?"active":""; ?>" href="profile.php">ข้อมูลส่วนตัว</a></li>
            <li><a class="<?php echo $url == 'homepage'?"active":""; ?>" href="homepage.php">ภาพยนตร์</a></li>
            <li><a class="<?php echo $url == 'history'?"active":""; ?>" href="history.php">รายการจองที่นั่ง</a></li>
            <li><a href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบ')" style="text-align:center; color:red;">ออกจากระบบ</a></li>
        </ul>
    </div>
</body>
</html>