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
            position: fixed;
            background-color: rgba(255,255,255,0.3);
        }
        .sidebar h2 {
            color:#fff;
            text-align: center;
            margin:24px 0px 0px 0px;
        }
        .sidebar h5 {
            color:#fff;
            text-align: center;
            margin:6px 0px 24px 0px;
        }
        .sidebar ul {
            padding:0;
        }
        .sidebar li {
            list-style:none;
        }
        .sidebar a {
            text-decoration: none;
            color:#fff;
            display: block;
            padding:24px 0px 24px 50px;
            border-radius:3px;
            display: flex;
            align-items: center;
        }
        .sidebar .icon {
            width: 15px;
            height: 15px;
        }
        .sidebar .btn-logout {
            justify-content: center;
        }

        .sidebar a:hover {
            background-color: rgba(255,255,255,0.1);
        }
        .active {
            background-color: rgba(255,255,255,0.2);
        }
        .sidebar .btn-logout {
            text-align: center;
            padding: 24px;
            color:red;
        
        }
        .sidebar .btn-logout:hover {
            background-color: #b657577a;
        }
        .content {
            margin-left:20%;
            padding:16px;
        }
        .icon {
            width: 25px;
            height: 25px;
        }
        .sidebar2 {
            display: none;
        }
        .sidebar2 {
            width: 20vw;
            height: 100vh;
            top:0;
            left:0;
            position: fixed;
            background-color: rgba(255,255,255,0.3);
        }
        .sidebar2 h2 {
            color:#fff;
            text-align: center;
            margin:24px 0px 0px 0px;
        }
        .sidebar2 h5 {
            color:#fff;
            text-align: center;
            margin:6px 0px 24px 0px;
        }
        .sidebar2 ul {
            padding:0;
        }
        .sidebar2 li {
            list-style:none;            
        }
        .sidebar2 a {
            text-decoration: none;
            color:#fff;
            display: block;
            padding:24px 0px 24px 50px;
            border-radius:3px;
        }
        .sidebar2 a:hover {
            background-color: rgba(255,255,255,0.1);
        }
        .sidebar2 .btn-logout {
            text-align: center;
            padding: 24px;
            color:red;
        
        }
        .sidebar2 .btn-logout:hover {
            background-color: #b657577a;
        }
        .icon-logout {
            width: 25px;
            height: 25px;
        }
        .dropdown-header {
            display: none;
        }
        @media screen and (max-width: 1264px) {
            .sidebar {
                display: none;
            }
            .sidebar2 {
                display: block;
            }
            .sidebar2 h2 {
                font-size: 12px;
            }
            .sidebar2 h5 {
                font-size: 8px;
            }
            .sidebar2 a {
                display: flex;
                padding: 16px;
                align-items: center;
            }
            .sidebar2 .btn-logout {
            text-align: center;
            padding: 16px;
            color:red;
            justify-content: center;
            
            }
            .sidebar2 .btn-logout:hover {
                background-color: #b657577a;
            }
            .sidebar2 li a p {
                display: none;
            }
            .sidebar2 li a {
                display: flex;
                justify-content: center;
            }
            .sidebar2 li .btn-logout .icon {
                display: block !important;
            }

        }
        @media screen and (max-width: 1440px) {
            .sidebar {
                display: none;
            }
            .sidebar2 {
                display: block;
            }
            .sidebar2 h2 {
                font-size: 12px;
            }
            .sidebar2 h5 {
                font-size: 8px;
            }
            .sidebar2 a {
                display: flex;
                padding: 16px;
                align-items: center;
            }
            .sidebar2 .btn-logout {
            text-align: center;
            padding: 16px;
            color:red;
            justify-content: center;
            
            }
            .sidebar2 .btn-logout:hover {
                background-color: #b657577a;
            }
            .sidebar2 li .btn-logout .icon {
                display: none;
            }
        }
        @media screen and (max-width: 426px) {
            .sidebar2 {
                display: none;
            }
            .content {
                margin: 0;
                padding-top: 40px;
            }
            .dropdown-header {
                display: block;
            }
            .dropdown-header {
                width: 100%;
            }
            .dropdown-header-content {
                display: none;
            }
            .dropdown-header button {
                width: 100%;
                padding: 5px 12px;
                background-color: dodgerblue;
                border: none;
                color:white;
                cursor: pointer;
            }
            .dropdown-header-content li {
                list-style: none;
                background-color: dodgerblue;
            }
            .dropdown-header-content li a {
                text-decoration: none;
                padding: 5px 10px;
                color:white;
                cursor: pointer;
                display: flex;
                align-items: center;
                
            }
            .dropdown-header-content li a:hover {
                background-color: rgba(255,255,255,0.1);
            }
            .dropdown-header:hover .dropdown-header-content {
                display: block;
            }
            .dropdown-header .btn-logout {
                display: flex;
                justify-content: center;
                padding: 10px;
                width: 100%;
            }
            .dropdown-header .btn-logout:hover {
                background-color: #b657577a;
            }
            
            
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <h2>ระบบส่งเอกสารออนไลน์</h2>
            <h5>นักเรียนนักศึกษา วิทยาลัยเทคนิคชัยภูมิ</h5>
            <li><a class="<?php echo $url == 'profile'?"active":""; ?>" href="profile.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span>&nbsp;&nbsp;ข้อมูลส่วนตัว</a></li>
            <li><a class="<?php echo $url == 'send_user'?"active":""; ?>" href="send_user.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span>&nbsp;&nbsp;ส่งเอกสารให้บุคคล</a></li>
            <li><a class="<?php echo $url == 'send_department'?"active":""; ?>" href="send_department.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span>&nbsp;&nbsp;ส่งเอกสารให้เเผนก</a></li>
            <li><a class="<?php echo $url == 'send_history'?"active":""; ?>" href="send_history.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span>&nbsp;&nbsp;รายการที่ส่งเอกสารให้บุคคล</a></li>
            <li><a class="<?php echo $url == 'send_history_de'?"active":""; ?>" href="send_history_de.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span>&nbsp;&nbsp;รายการที่ส่งเอกสารให้เเผนก</a></li>
            <li><a class="<?php echo $url == 're_user'?"active":""; ?>" href="re_user.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span>&nbsp;&nbsp;รายการที่รับเอกสารจากบุคคล</a></li>
            <li><a class="<?php echo $url == 're_de'?"active":""; ?>" href="re_de.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span>&nbsp;&nbsp;รายการที่รับเอกสารจากเเผนก</a></li>
            <li><a class="btn-logout" style="color:red;" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบ')">ออกจากระบบ</a></li>
        </ul>
    </div>
    <div class="sidebar2">
    <ul>
            <h2>ระบบส่งเอกสารออนไลน์</h2>
            <h5>นักเรียนนักศึกษา วิทยาลัยเทคนิคชัยภูมิ</h5>
            <li><a class="<?php echo $url == 'profile'?"active":""; ?>" href="profile.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span><p>ข้อมูลส่วนตัว</p></a></li>
            <li><a class="<?php echo $url == 'send_user'?"active":""; ?>" href="send_user.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span><p>ส่งเอกสารให้บุคคล</p></a></li>
            <li><a class="<?php echo $url == 'send_department'?"active":""; ?>" href="send_department.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span><p>ส่งเอกสารให้เเผนก</p></a></li>
            <li><a class="<?php echo $url == 'send_history'?"active":""; ?>" href="send_history.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span><p>รายการที่ส่งเอกสารให้บุคคล</p></a></li>
            <li><a class="<?php echo $url == 'send_history_de'?"active":""; ?>" href="send_history_de.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span><p>รายการที่ส่งเอกสารให้เเผนก</p></a></li>
            <li><a class="<?php echo $url == 're_user'?"active":""; ?>" href="re_user.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span><p>รายการที่รับเอกสารจากบุคคล</p></a></li>
            <li><a class="<?php echo $url == 're_de'?"active":""; ?>" href="re_de.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span><p>รายการที่รับเอกสารจากเเผนก</p></a></li>
            <li><a class="btn-logout" style="color:red;" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบ')"><span><img class="icon" src="../assets\icon\logout.png" alt=""></span><p>ออกจากระบบ</p></a></li>
        </ul>
    </div>
    <div class="dropdown-header">
        <button>
            ระบบส่งเอกสารออนไลน์
        </button>
        <div class="dropdown-header-content">
        <li><a class="<?php echo $url == 'profile'?"active":""; ?>" href="profile.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span>ข้อมูลส่วนตัว</a></li>
            <li><a class="<?php echo $url == 'send_user'?"active":""; ?>" href="send_user.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span>ส่งเอกสารให้บุคคล</a></li>
            <li><a class="<?php echo $url == 'send_department'?"active":""; ?>" href="send_department.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span>ส่งเอกสารให้เเผนก</a></li>
            <li><a class="<?php echo $url == 'send_history'?"active":""; ?>" href="send_history.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span>รายการที่ส่งเอกสารให้บุคคล</a></li>
            <li><a class="<?php echo $url == 'send_history_de'?"active":""; ?>" href="send_history_de.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span>รายการที่ส่งเอกสารให้เเผนก</a></li>
            <li><a class="<?php echo $url == 're_user'?"active":""; ?>" href="re_user.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span>รายการที่รับเอกสารจากบุคคล</a></li>
            <li><a class="<?php echo $url == 're_de'?"active":""; ?>" href="re_de.php"><span><img class="icon" src="../assets\icon\admin.png" alt=""></span>รายการที่รับเอกสารจากเเผนก</a></li>
            <li><a class="btn-logout" style="color:red;" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบ')">ออกจากระบบ</a></li>
        </div>
    </div>
</body>
</html>