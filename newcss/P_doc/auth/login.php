<?php require_once 'header.php'; 
if(isset($_POST['email'])){
    $password = MD5($_POST['password']);
    $fields = array(
        'email' => $_POST['email'],
        'password' => $password,
    );
    $log = $db->selectwhere('users', $fields);
    if(empty($log[0])){
        alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง');
        redirect('login.php');
    }else{
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
                        alert('เข้าสู่ระบบผู้ดูเเลการใช้งาน');
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
        <div class="box-fixed" style="width:500px;">
            <div class="form-login">
            <h2>ลงทะเบียน</h2>
    <form method="post">
        <!-- <img src="" alt=""> -->
        <p>อีเมล</p>
        <input type="email" name="email" required placeholder="อีเมล">
        <p>รหัสผ่าน</p>
        <input type="password" name="password" required placeholder="รหัสผ่าน">
        <br><br>
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