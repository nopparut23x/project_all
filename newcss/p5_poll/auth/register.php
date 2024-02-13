<?php
require_once 'header.php';
if(isset($_POST['fname'])){
    $where = array(
        'email' => $_POST['fname']
    );
    $log = $db->selectwhere('users', $where);
    if(!empty($log[0])){
        alert('อีเมลนี้ถูกใช้งานเเล้ว');
    }else{
        $password = MD5($_POST['password']);
        if(!empty($_FILES['img']['name'])){
            $file = $db->upload($_FILES['img'], $path = 'assets/img');
        }
        $fields = array(
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'password' => $password,
            'tell' => $_POST['tell'],
            'address' => $_POST['address'],
            'profile' => $file,
            'usg_status' => 'user',
            'status' => 1
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
        <div class="form-register">
        <h2>ลงทะเบียน</h2>
    <form method="post" enctype="multipart/form-data">
    <center>
    <!-- <img src="" > -->
    <input type="file" name="img" required>
    </center>    
        <p>ชื่อ</p>
        <input type="text" name="fname" placeholder="ชื่อ" required>
        <p>นามสกุล</p>
        <input type="text" name="lname" placeholder="นามสกุล" required>
        <p>อีเมล</p>
        <input type="email" name="email" placeholder="อีเมล" required>
        <p>รหัสผ่าน</p>
        <input type="password" name="password" placeholder="รหัสผ่าน" required>
        <p>ที่อยู่</p>
        <input type="text" name="address" placeholder="ที่อยู่" required>
        <p>เบอร์โทรศัพท์</p>
        <input type="text" name="tell" placeholder="เบอร์โทรศัพท์" required>
        <br>
        <br>
   <button class="btn btn-w100" type="submit">
    ลงทะเบียน
   </button>
   <br>
   <a href="login.php">เข้าสู่ระบบ</a>
    </form>  
        </div>
    </div>
 </div>
</body>
</html>