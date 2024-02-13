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
            color:gray;
        }
        .sidebar li a:hover {
            background-color: rgba(0,0,0,0.1);
        }
        .btn-logout {
            color:white !important;
            text-align: center;
            background-color: #FF9800;
        }
        .btn-logout:hover {
            background-color: gray;
        }
        .active {
            background-color: rgba(0,0,0,0.2);
        }
        .content {
            margin-left: 20vw;
            padding: 16px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>ยินดีตอนรับ</h2>
        <h6>วิทยาลัย เทคนิคชัยภูมิ</h6>
        <ul>
            <li><a class="active" href="">ทดสอบระบบ</a></li>
            <li><a href="">ทดสอบระบบ</a></li>
            <li><a href="">ทดสอบระบบ</a></li>
            <li><a href="">ทดสอบระบบ</a></li>
            <li><a href="">ทดสอบระบบ</a></li>
            <li><a class="btn-logout" href="">ออกจากระบบ</a></li>
        </ul>
    </div>
</body>
</html>