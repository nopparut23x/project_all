<?php
if(empty($_SESSION['user_id'])){
    header('Location:../');
}

?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing:border-box;
            font-family: Arial,sans-serif;
        }
        .sidebar {
            background-color: rgba(0,0,0,0.3);
            width: 20%;
            height:100vh;
            top:0;
            left:0;
            position: fixed;
        }
        .sidebar h3 {
            margin:24px 24px 0px 24px;
            text-align: center;
            color:#fff;
        }
        .sidebar h5 {
            margin:0px 24px 24px 24px;
            text-align: center;
            color:#fff;
            border-bottom:2px solid wh
        }
        .sidebar ul {
            padding:0;
        }
        .sidebar li {
            list-style:none;
        }
        .sidebar a {
            color:#fff;
            text-decoration: none;
            display: block;
            padding:24px;

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
        @media screen and (max-width: 426px) {
            .sidebar h3 {
                font-size: 6px;
                margin-bottom: 24px ;
            }
            .sidebar h5 {
                display: none;
            }
            .sidebar a {
                font-size: 6px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <h3>ระบบเเบบสำรวจออนไลน์</h3>
            <h5>itctc66</h5>
            <li><a class="<?php echo $url == 'profile'?"active":""; ?>" href="profile.php">ข้อมูลส่วนตัว</a></li>
            <li><a class="<?php echo $url == 'poll'?"active":""; ?>" href="poll.php">เเบบสำรวจ</a></li>
            <li><a  onclick="return confirm('คุณต้องการออกจากระบบ')" href="logout.php" style="color:white; text-align:center; border-top:2px solid white; border-bottom:2px solid white;">ออกจากระบบ</a></li>
        </ul>
    </div>
</body>
</html>