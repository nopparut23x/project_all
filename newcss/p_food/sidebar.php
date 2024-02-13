<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../config/style.css">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing:border-box;
        font-family: Arial,sans-serif;
    }
    .sidebar {
        background-color: #333;
        width: 20vw;
        height: 100vh;
        top:0;
        left:0;
        position: fixed;
    }
    .sidebar h2,h6 {
        text-align: center;
        color:white;
    }
    .sidebar h2 {
        margin-top: 24px;
    }
    .sidebar h6 {
        margin-bottom: 24px;
    }
    .sidebar ul {
        padding: 0;
    }
    .sidebar li {
        list-style: none;
    }
    .sidebar li a {
        color:#fff;
        display: block;
        padding: 16px 10px;
        
    }
    .sidebar li a:Hover {
        background-color: rgba(255,255,255,0.1);
    }
    a {
        text-decoration: none;
    }
    .active {
        background-color: rgba(255,255,255,0.2);
    }
    .content {
        margin-left: 20vw;
        padding: 16px;
    }
</style>
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
            <li><a href="">ทดสอบระบบ</a></li>
        </ul>
    </div>
    <div class="content">
        hello
    </div>
</body>
</html>