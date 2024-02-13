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
            case"0";
            alert('บัญชีของคุณถูกระงับ');
            redirect('login.php');
            break;
            case"1";
            switch($row['usg_status']){
                case"user":
                    alert('เข้าสู่ระบบผู้ใช้งาน');
                    redirect('../user');
                break;
                case"admin":
                    alert('เข้าสู่ระบบผู้ดูเเลการใช้งาน');
                    redirect('../admin');
                break;
            }
            break;
        }
    }else{
        $where2 = array(
            'email' => $_POST['email']
        );
        $log2 = $db->selectwhere('users', $where2);
        if(!empty($log2)){
            alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง');
            redirect('login.php');
        }else{
            alert('ไม่พบบัญชีเข้าใช้งานกรุณาลงทะเบียน');
            redirect('login.php');
        }
    }
}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
                <div class="img-center">
                    <img src="../assets\img\user3.png" alt="">
                </div>
            <h2>เข้าสู่ระบบ</h2>
            <form  method="post">
                <p>อีเมล</p>
                <input type="email" name="email" placeholder="อีเมล" required>
                <p>รหัสผ่าน</p>
                <input type="password" name="password" placeholder="รหัสผ่าน" required>
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