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

        h1,
        h2 {
            color: white;
        }
        h5,h6 {
            color:white;
        }

        h3 {
            color: #999;
        }

        .btn {
            background: #f05462;
            color: white;
            padding: 5px 10px;
            text-align: center;
        }

        .btn:hover {
            color: #f05462;
            background: white;
            padding: 3px 8px;
            border: 2px solid #f05462;
        }

        .title {
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 15px 10px;
            border-bottom: 2px solid #999;
        }

        table {
            padding: 10px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
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
            font-size: 24px;
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
            <h1>แบบสำรวจ</h1>
        </div>
        <ul>
            <li><a class="active" href=""><img src="img\admin.png" alt="">&nbsp; <span>ทดสอบระบบ</span></a></li>
            <li><a href=""><img src="img\admin.png" alt="">&nbsp; <span>ทดสอบระบบ</span></a></li>
            <li><a href=""><img src="img\admin.png" alt="">&nbsp; <span>ทดสอบระบบ</span></a></li>
            <li><a href=""><img src="img\admin.png" alt="">&nbsp; <span>ทดสอบระบบ</span></a></li>
            <li><a href=""><img src="img\admin.png" alt="">&nbsp; <span>ทดสอบระบบ</span></a></li>
            <li><a class="tcc" href=""><img src="img\logout.png" alt="">&nbsp; <span>ออกจากระบบ</span></a></li>
        </ul>
    </div>

</body>
</html>