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
    </style>
</head>
<body>
    <div class="navbar">
        <ul>
            <strong>ยินดีตอนรับ</strong>
            <li><a class="active" href="">ระบบทดสอบ</a></li>
            <li><a href="">ระบบทดสอบ</a></li>
            <li><a href="">ระบบทดสอบ</a></li>
            <li><a href="">ระบบทดสอบ</a></li>
            <li><a href="">ระบบทดสอบ</a></li>
            <li><a class="btn-logout" href="">ออกจากระบบ</a></li>
        </ul>
    </div>
    <div class="sidebar">
        <h2>ยินดีตอนรับ</h2>
        <h5>วิทยาลัย เทคนิคชัยภูมิ</h5>
        <ul>
            <li><a class="active" href="">ระบบทดสอบ</a></li>
            <li><a href="">ระบบทดสอบ</a></li>
            <li><a href="">ระบบทดสอบ</a></li>
            <li><a href="">ระบบทดสอบ</a></li>
            <li><a href="">ระบบทดสอบ</a></li>
            <li><a class="btn-logout" href="">ออกจากระบบ</a></li>
        </ul>
    </div>
    <div class="content">
        hello
    </div>
</body>
</html>