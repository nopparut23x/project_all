<?php if(empty($_SESSION['user_id'])){
    header('Location:../');
} ?>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing:border-box;
            font-family: Arial,sans-serif;
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
            padding: 0;
        }
        .sidebar h3 {
            color:#fff;
            text-align: center;
            margin:24px 0px 0px 0px;
        }
        .sidebar h6 {
            color:#fff;
            text-align: center;
            margin: 2px 0px 24px 0px;
        }
        .sidebar li {
            margin:6px 12px 6px 12px;
            list-style:none;
        }
        .sidebar a {
            display: block;
            color:#fff;
            text-decoration: none;
            padding:24px;
            border-radius:6px;

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
            <h3>[ระบบเลือกตั้งออนไลน์]</h3>
            <h6>เว็บไซต์ร่วมกันโหวต วิทยาลัยเทคนิคชัยภูมิ</h6>
            <li><a class="<?php echo $url == "profile"?"active":""; ?>" href="profile.php">ข้อมูลส่วนตัว</a></li>
            <li><a class="<?php echo $url == "user"?"active":""; ?>" href="user.php">ผู้ใช้สิทธิเลือกตั้ง</a></li>
            <li><a class="<?php echo $url == "vote"?"active":""; ?>" href="vote.php">การเลือกตั้ง</a></li>
            <li><a class="<?php echo $url == "score"?"active":""; ?>" href="score.php">คะเเนนเลือกตั้ง</a></li>
            <li><a href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบ')" style="text-align:center; color:red;">ออกจากระบบ</a></li>
        </ul>
    </div>
</body>
</html>