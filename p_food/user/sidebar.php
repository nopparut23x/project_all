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
            background-color: #333;
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
        }
        .sidebar ul {
            padding:0;
        }
        .sidebar li {
            list-style:none;
            margin:6px 12px 6px 12px;
        }
        .sidebar a {
            color:#fff;
            text-decoration: none;
            display: block;
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
            <h3>ระบบออเดอร์อาหารออนไลน์</h3>
            <h5>itctc66</h5>
            <li><a class="<?php echo $url == 'profile'?"active":""; ?>" href="profile.php">ข้อมูลส่วนตัว</a></li>
            <li><a class="<?php echo $url == 'food'?"active":""; ?>" href="food.php">อาหาร</a></li>
            <li><a class="<?php echo $url == 'cart'?"active":""; ?>" href="cart.php">ตะกร้า</a></li>
            <li><a class="<?php echo $url == 'order'?"active":""; ?>" href="status.php">การสั่งอาหาร</a></li>
            <li><a class="<?php echo $url == 'history'?"active":""; ?>" href="history.php">ประวัติการสั่งอาหาร</a></li>
            <li><a  onclick="return confirm('คุณต้องการออกจากระบบ')" href="logout.php" style="color:red; text-align:center;">ออกจากระบบ</a></li>
        </ul>
    </div>
</body>
</html>