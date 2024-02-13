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
            box-sizing:border-box;
            font-family: Arial,sans-serif;
        }
        .sidebar {
            width: 20vw;
            height: 100vh;
            top:0;
            left:0;
            background-color: #ccc;
            position: fixed;
        }
        .sidebar h2 {
            margin-top: 24px;
            text-align: center;
        }
        .sidebar h6 {
            margin-bottom: 24px;
            text-align: center;
        }
        .sidebar ul {
            padding: 0;
        }
        .sidebar li {
            list-style: none;
        }
        .sidebar li a {
            text-decoration: none;
            display: block;
            padding: 10px;
            color:black;
        }
        .sidebar li a:hover {
            background-color: rgba(0,0,0,0.1);
        }
        .sidebar .btn-logout {
            color:white !important;
            text-align: center;
            background-color: #FF9800;
        }
        .sidebar .btn-logout:hover {
            background-color: gray;
        }
        .active {
            background-color: rgba(0,0,0,0.2);
        }
        .content {
            margin-left: 20vw;
            padding: 16px;
        }
        .navbar {
            display: none;
        }
        @media screen and (max-width: 768px) {
            .sidebar {
            display: none;
        }
        .content {
            margin: 0;
        }
        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ccc;
        }
        .navbar strong {
            margin-right: 10px;
        }
        .navbar ul {
            display: flex;
            align-items: center;
        }
        .navbar li {
            list-style: none;
        }
        .navbar li a {
            display: block;
            padding: 10px;
            color:black;
        }
        .navbar li a:hover {
            background-color: rgba(0,0,0,0.2);
        }
        .navbar .btn-logout {
            color:white !important;
            text-align: center;
            background-color: #FF9800;
        }
        .navbar .btn-logout:hover {
            background-color: gray;
        }
        a {
            font-size: 12px;
            text-align: center;
        }
        strong {
            font-size: 12px;
            text-align: center;
        }
        }
    </style>
</head>
<body>
<div class="navbar">
        <strong><p>ระบบเลือกตั้งออนไลน์</p></strong>
        <ul>
            <li><a class="<?php echo $url == 'profile'?"active":""; ?>" href="profile.php">ข้อมูลส่วนตัว</a></li>
            <li><a class="<?php echo $url == 'vote'?"active":""; ?>" href="vote.php">เลือกตั้ง</a></li>
            <li><a class="<?php echo $url == 'score_vote'?"active":""; ?>" href="score_vote.php">ผลคะเเนนเลือก</a></li>
            <li><a class="btn-logout" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบ?')">ออกจากระบบ</a></li>
        </ul>
    </div>
    <div class="sidebar">
        <h2>ระบบเลือกตั้งออนไลน์</h2>
        <h6>วิทยาลัย เทคนิคชัยภูมิ</h6>
        <ul>
            <li><a class="<?php echo $url == 'profile'?"active":""; ?>" href="profile.php">ข้อมูลส่วนตัว</a></li>
            <li><a class="<?php echo $url == 'vote'?"active":""; ?>" href="vote.php">เลือกตั้ง</a></li>
            <li><a class="<?php echo $url == 'score_vote'?"active":""; ?>" href="score_vote.php">ผลคะเเนนเลือก</a></li>
            <li><a class="btn-logout" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบ?')">ออกจากระบบ</a></li>
        </ul>
    </div>
</body>
</html>