<?php
require_once 'header.php';
if(isset($_POST['email'])){
    $password = MD5($_POST['password']);
    $where = array(
        'email' => $_POST['email'],
        'password' => $password,
    );
    $log = $db->selectwhere('users', $where);
    if(!empty($log[0])){
        foreach($log as $row);
        switch($row['status']){
            case"1":
                switch($row['usg_status']){
                    case"admin":
                        $_SESSION['user_id_admin'] = $row['user_id'];
                      alert('เข้าสู่ระบบผู้ดูเเลการใช้งาน');
                      redirect('../admin');
                    break;
                    case"user":
                        $_SESSION['user_id_user'] = $row['user_id'];
                        alert('เข้าสู่ระบบผู้ใช้งาน');
                        redirect('../user');
                    break;
                }
            break;
            case"0":
                alert('บัญชีของคุณถูกระงับ');
                redirect('login.php');
            break;
        }
    }else{
       $where_2 = array(
        'email' => $_POST['email']
       );
       $log2 = $db->selectwhere('users', $where_2);
       if(empty($log2)){
        alert('ยังไม่มีบัญชีกรุณาลงทะเบียน');
        redirect('login.php');
       }else{
        alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง');
        redirect('login.php');
       }
    }
}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-login">
            <h2>เข้าสู่ระบบ</h2>
    <form method="post">
        <center>
            <!-- <img src=""> -->
        </center>
        <p>อีเมล</p>
        <input type="email" name="email" placeholder='อีเมล' required>
        <p>รหัสผ่าน</p>
        <input type="password" name="password" placeholder='รหัสผ่าน' required>
        <br><br>
        <button class="btn btn-w100" type="submit">
            เข้าสู่ระบบ
        </button>
        <br>
        <a href="register.php">ลงทะเบียน</a>

        <a href="../">กลับ</a>
    </form>
            </div>
        </div>
    </div>
</body>
</html>