<?php
require_once 'header.php';
if(isset($_POST['email'])){
    $password = md5($_POST['password']);
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
                alert('บัญชีของคุณถูกระงับชั่วคราว');
                redirect('login.php');
            break;
            case"1":
                switch($row['usg_status']){
                    case"admin":
                        alert('เข้าสู่ระบบผู้ดูเเล');
                        redirect('../admin');
                    break;
                    case"user":
                        alert('เข้าสู่ระบบผู้ใช้งาน');
                        redirect('../user');
                    break;
                };
            break;
        }
    }
}
?>

<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <form method="post">
                <div style="display:flex; justify-content:center; margin-top:-165px">
                <img src="../assets\icon\boy.png" alt="" style="width:200px; height:200px; ">
                </div>
                <h2>เข้าสู่ระบบ</h2>
                <p>อีเมล</p>
                <input type="email" name="email" required placeholder="">
                <p>รหัสผ่าน</p>
                <input type="password" name="password" required placeholder="">
                <br>
                <br>
                <button type="submit">
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