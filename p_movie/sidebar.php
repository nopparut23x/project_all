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
            <h2>ยินดีตอนรับ</h2>
            <h5>วิทยาลัย เทคนิคชัยภูมิ</h5>
            <li><a class="active" href="">ทดสอบระบบ</a></li>
            <li><a href="">ทดสอบระบบ</a></li>
            <li><a href="">ทดสอบระบบ</a></li>
            <li><a href="">ทดสอบระบบ</a></li>
            <li><a href="">ทดสอบระบบ</a></li>
            <li><a href="" style="text-align:center; color:red;">ออกจากระบบ</a></li>
        </ul>
    </div>
</body>
</html>