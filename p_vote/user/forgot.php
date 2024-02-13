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
    if($password_o == $row['password']){
        if($_POST['password_n'] == $_POST['password_s']){
            $fields = array(
                'password' => $password_n,
            );
            $insert = $db->update('users', $fields, $where);
            if($insert){
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
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <form method="post" enctype="multipart/form-data">
        <h1>เเก้ไขรหัสผ่าน</h1>
        <p>รหัสผ่านเก่า</p>
        <input type="password" name="password_o" placeholder="รหัสผ่านเก่า">
        <p>รหัสผ่านใหม่</p>
        <input type="password" name="password_n" placeholder="รหัสผ่านใหม่">
        <p>ยืนยันรหัสผ่าน</p>
        <input type="password" name="password_s" placeholder="ยืนยันรหัสผ่าน">
        <br>
        <br>
        <button type="submit" onclick="return confirm('คุณต้องการเเก้ไขรหัสผ่าน?')">
            เเก้ไขรหัสผ่าน
        </button>
        <br><br>
    </form>
            </div>
        </div>
    </div>
</body>
</html>