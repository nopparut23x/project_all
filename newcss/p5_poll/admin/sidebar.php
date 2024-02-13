
<?php  
if(empty($_SESSION['user_id_admin'])){
    header("Location:../");
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
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
        }
        .side-menu img {
            width: 25px;
            height: 25px;
        }
        a {
            text-decoration: none;
        }

        li {
            list-style: none;
        }

        .side-menu h1,
        .side-menu h2 {
            color: white;
        }
        .side-menu h5, .side-menu h6 {
            color:white;
        }

        h3 {
            color: #999;
        }

        .side-menu {
            position: fixed;
            background: dodgerblue;
            width: 20vw;
            min-width: 117px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .side-menu .brand-name {
            height: 10vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .side-menu li a {
            font-size: 16px;
            padding: 10px 40px;
            color: white;
            display: flex;
            align-items: center;
        }

        .side-menu li a:hover {
            background: white;
            color: dodgerblue;
        }
        .tcc {
            justify-content: center;
            padding: 0;
        }
        .active {
            background-color: rgba(0,0,0,0.3);
        }
        .content {
            margin-left: 20vw;
            padding: 16px;
        }
        @media screen and (max-width: 1050px) {
            .side-menu li a {
                font-size: 18px;
            }
        }
        @media screen and (max-width: 1230px) {
            .side-menu li a {
                font-size: 14px;
            }
        }
        @media screen and (max-width: 940px) {
            .side-menu li a span {
                display: none;
            }

            .side-menu {
                align-items: center;
            }

            .side-menu  li a img {
                width: 40px;
                height: 40px;
            }

            .side-menu li a:hover {
                background: rgba(0,0,0,0.3);
                padding: 8px 38px;
                border: 2px solid white;
            }
        }

        @media screen and (max-width:780px) {
            .brand-name h1 {
                font-size: 16px;
            }

            .container .content .cards {
                justify-content: center;
            }

            .side-menu li a img{
                width: 30px;
                height: 30px;
            }

            .container .content .content-2 .recent-payments table th:nth-child(2),
            .container .content .content-2 .recent-payments table td:nth-child(2) {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h2>ระบบเเบบสำรวจออนไลน์</h2>
        </div>
        <ul>
            <li><a class="<?php echo $url == "profile"?"active":""; ?>" href="profile.php"><img src="../assets/img/admin.png" alt="">&nbsp; <span>ข้อมูลส่วนตัว</span></a></li>
            <li><a class="<?php echo $url == "user"?"active":""; ?>" href="user.php"><img src="../assets/img/admin.png" alt="">&nbsp; <span>จัดการผู้ใช้งาน</span></a></li>
            <li><a class="<?php echo $url == "type"?"active":""; ?>" href="type.php"><img src="../assets/img/admin.png" alt="">&nbsp; <span>จัดการประเภทเเบบสำรวจ</span></a></li>
            <li><a onclick="return confirm('คุณต้องการออกจากระบบ')" class="tcc" href="logout.php"><img src="../assets/img/logout.png" alt="">&nbsp; <span>ออกจากระบบ</span></a></li>
        </ul>
    </div>

</body>
</html>