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
            width: 20%;
            height: 100vh;
            top:0;
            left:0;
            position: fixed;
            background-color: #333;
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
        .sidebar .btn-logout {
            text-align: center;
            color:red;
        
        }
        .sidebar .btn-logout:hover {
            background-color: #ffa0a01f;
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
            <h2>ยินดีตอนรับ</h2>
            <h5>นักเรียนนักศึกษา วิทยาลัยเทคนิคชัยภูมิ</h5>
            <li><a class="active" href="">ทดสอบระบบ</a></li>
            <li><a class="" href="">ทดสอบระบบ</a></li>
            <li><a class="" href="">ทดสอบระบบ</a></li>
            <li><a class="" href="">ทดสอบระบบ</a></li>
            <li><a class="" href="">ทดสอบระบบ</a></li>
            <li><a class="btn-logout" style="color:red;" href="">ออกจากระบบ</a></li>
        </ul>
    </div>
    <div class="content">
        hello
    </div>
</body>
</html>