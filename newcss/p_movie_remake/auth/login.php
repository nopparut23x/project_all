<?php require_once 'header.php'; 
if(isset($_POST['email'])){
    $password = md5($_POST['password']);
    $where = array(
        'email' => $_POST['email'],
        'password' => $password,
    );

    $log = $db->selectwhere('users', $where);
    if(!empty($log[0])){    
        foreach($log as $row);
        $_SESSION['user_id'] = $row['user_id'];
            switch($row['status']){
                case"0":
                    alert('บัญชีของคุณถูกระงับ');
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
    }else{
        alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง');
        redirect('login.php');
    }
}

?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-login">
            <form method="post" enctype="multipart/form-data">
        <div class="img-center">
            <img src="../assets\img\user5.png" alt="">
        </div>
        <h1>เข้าสู่ระบบ</h1>
        <p>อีเมล</p>
        <input type="email" name="email" required placeholder="อีเมล">
        <p>รหัสผ่าน</p>
        <input type="password" name="password" required placeholder="รหัสผ่าน">
        <br><br>
        <button class="btn btn-w100" type="submit">
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