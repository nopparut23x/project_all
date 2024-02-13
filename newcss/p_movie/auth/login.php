<?php 
require_once 'header.php';
if(isset($_POST['email'])){
    $password = MD5($_POST['password']);
    $where = array(
        'email' => $_POST['email'],
        'password' => $password,
    );
    $log = $db->selectwhere('users', $where);
    if(empty($log[0])){
        alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง');
        redirect('login.php');
    }else{
        foreach($log as $row);
        $_SESSION['user_id'] = $row['user_id'];
        switch($row['status']){
            case"0":
                alert('บัญชีของคุณถูกระงับการใช้งาน');
                redirect('login.php');
            break;
            case"1":
                switch($row['usg_status']){
                    case"admin":
                        alert('เข้าสู่ระบบผู้ดูเเลการใช้งาน');
                        redirect('../admin');
                    break;
                    case"user":
                        alert('เข้าสู่ระบบผู้ใช้งาน');
                        redirect('../user');
                    break;
                }
            break;
        }
    }
}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
        <div class="form-login">
    <h2>เข้าสู่ระบบ</h2>
    <div class="img-center">
<img src="../assets/img/man.png" width="200px">
</div>
    <form method="post" enctype="multipart/form-data">
    <p>อีเมล</p>
    <input type="email" name="email" placeholder="อีเมล" required>
    <p>รหัสผ่าน</p>
    <input type="password" name="password" placeholder="รหัสผ่าน" required>
    <br><br>
    <button class="btn" type="submit">
        เข้าสู่ระบบ
    </button>
    <br>
    <a href="register.php">ลงทะเบียน</a>
    </form>
    </div>
    </div>
    </div>
</body>
</html>