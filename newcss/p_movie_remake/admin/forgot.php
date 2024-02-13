<?php

$url = "profile";
require_once 'header.php';
$where = array(
    'user_id' => $_SESSION['user_id'],
);
$log = $db->selectwhere('users', $where);
foreach($log as $row);

if(isset($_POST['password_o'])){
    $password_o = md5($_POST['password_o']);
    $password_n = md5($_POST['password_n']);
    if($row['password'] == $password_o){
        if($_POST['password_n'] == $_POST['password_s']){
                $fields = array(
                    'password' => $password_n
                );
                $update = $db->update('users', $fields, $where);
                if($update){
                    alert('เเก้ไขรหัสผ่านเรียบร้อย');
                    redirect('profile.php');
                }
        }else{
            alert('รหัสผ่านยืนยันไม่ตรงกัน');
            redirect('forgot.php');
        }
    }else{
        alert('รหัสผ่านเก่าไม่ถูกต้อง');
        redirect('forgot.php');
    }
}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form" style="width:500px;">
            <div class="form-content">
            <form enctype="multipart/form-data" method="post">
    <h1>เเก้ไขรหัสผ่าน</h1>
    <p>รหัสผ่านเก่า</p>
    <input type="password" name="password_o" required placeholder="รหัสผ่าน" >
    <p>รหัสผ่านใหม่</p>
    <input type="password" name="password_n" required placeholder="รหัสผ่านใหม่" >
    <p>ยืนยันรหัสผ่าน</p>
    <input type="password" name="password_s" required placeholder="ยืนยันรหัสผ่าน">
    <br>
    <br>
    <button class="btn btn-w100" type="submit">
        เเก้ไขรหัสผ่าน
    </button>
    </form>
            </div>
        </div>
    </div>
</body>
</html>