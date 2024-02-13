<?php 
$url = "profile";
require_once 'header.php';
$where = array(
    'user_id' => $_SESSION['user_id'],
 );
 $log = $db->selectwhere('users', $where);
 foreach($log as $row);

if(isset($_POST['save'])){
    $password_o = MD5($_POST['password_o']);
    $password_n = MD5($_POST['password_n']);
    if($password_o == $row['password']){
        if($_POST['password_o'] == $_POST['password_s']){
            $fields = array(
                'password' => $password_n
            );
            $update = $db->update('users', $fields , $where);
            if($update){
                alert('เเก้ไขรหัสผ่านเรียบร้อย');
                reidrect('profile.php');
            }
        }else{
            alert('รหัสผ่านยืนยันไม่ถูกต้อง');
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
        <div class="box-fixed boxset-form" style="width:700px">
        <div class="form-register">
        <div class="img-center">
            <img src="../assets/img/man.png" width="200px">
        </div>
    <form method="post" enctype="multipart/form-data">
        <h2>เเก้ไขรหัสผ่าน</h2>
        <p>รหัสผ่านเก่า</p>
        <input type="password" name="password_o" required placeholder="รหัสผ่านเก่า"  >
        <p>รหัสผ่านใหม่</p>
        <input type="password" name="password_n" required placeholder="รหัสผ่านใหม่" >
        <p>ยืนยันรหัสผ่าน</p>
        <input type="password" name="password_s" required placeholder="ยืนยันรหัสผ่าน" >
        <br>
        <br>
        <button class="btn" type="submit" name="save">
            เเก้ไขรหัสผ่าน
        </button>
        <br>
    </form>
</div>
</div>
</div>
</body>
</html>