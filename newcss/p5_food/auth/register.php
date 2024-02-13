<?php
require_once 'header.php';

if(isset($_POST['fname'])){
    $where = array(
        'email' => $_POST['email'],
    );
    $log = $db->selectwhere('users', $where);
    if(!empty($log[0])){
        alert('อีเมลนี้ถูกใช้งานเเล้ว');
        redirect('regiter.php');
    }else{
        foreach($log as $row);
        if(!empty($_FILES['img']['name'])){
            $file = $db->upload($_FILES['img'], $path = "assets/img");
        }
        $password = md5($_POST['password']);
        $fields = array(
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'password' => $password,
            'tell' => $_POST['tell'],
            'address' => $_POST['address'],
            'status' => '1',
            'usg_status' => 'user',
            'profile' => $file,
        );
        $insert = $db->insert('users', $fields);
        if($insert){
            alert('ลงทะเบียนเรียบร้อย');
            redirect('login.php');
        }
    }
}
?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
    <form enctype="multipart/form-data" method="post">
    <h1>ลงทะเบียน</h1>
    <center>
        <input type="file" name="img" required>
    </center>
    <p>ชื่อ</p>
    <input type="text" name="fname" required placeholder="ชื่อ">
    <p>นามสกุล</p>
    <input type="text" name="lname" required placeholder="นามสกุล">
    <p>อีเมล</p>
    <input type="email" name="email" required placeholder="อีเมล">
    <p>รหัสผ่าน</p>
    <input type="password" name="password" required placeholder="รหัสผ่าน">
    <p>เบอร์โทร</p>
    <input type="text" name="tell" required placeholder="เบอร์โทร">
    <p>ที่อยู่</p>
    <input type="text" name="address" required placeholder="ที่อยู่">
    <br>
    <br>
    <button type="submit">
        ลงทะเบียน
    </button>
    <br><br>
    <a href="login.php">เข้าสู่ระบบ</a>
    </form>
    </div>
        </div>
    </div>
</body>
</html>