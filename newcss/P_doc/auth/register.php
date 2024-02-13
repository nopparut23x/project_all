<?php require_once 'header.php';
if(isset($_POST['email'])){
    $where = array(
        'email' => $_POST['email'],
    );
    $log = $db->selectwhere('users', $where);
    if(!empty($log[0])){
        alert('อีเมลนี้ถูกใช้งานเเล้ว');
        redirect('register.php');
    }else{
        if($_FILES['img']['name']){
            $file = $db->upload($_FILES['img'], $path = 'assets/img');
        }
        $password = MD5($_POST['password']);
        $fields = array(
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'password' => $password,
            'address' => $_POST['address'],
            'tell' => $_POST['tell'],
            'de_id' => $_POST['de_name'],
            'usg_status' => 'user',
            'status' => '1',
            'profile' => $file,
                ); 
        $insert = $db->insert('users', $fields);
        if($insert){
            alert('ลงทะเบียนเรียบร้อย');
            redirect('login.php');
        }
    }
}
$op = $db->select('department');
?>
<body>
    <div class="d-center">
        <div class="box-fixed" style="width:500px;">
            <div class="form-register">
            <h2>ลงทะเบียน</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="img-center">
            <img src="../assets\img\65b6ba8a39edc.png" alt="" style="width:200px; height:200px;"> 
        </div>
        <br>
    <center>
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
    <p>เบอร์โทรศัพท์</p>
    <input type="text" name="tell" placeholder="เบอร์โทรศัพท์" required>
    <p>ที่อยู่</p>
    <input type="text" name="address" placeholder="ที่อยู่" required>
    <br>
    <label for="">เเผนกวิชา</label>
    <select name="de_name">
        <?php foreach($op as $row){ ?>
<option value="<?php echo $row['de_id'] ?>"><?php echo $row['de_name'] ?></option>
    <?php } ?>
    </select>
    <br>
    <br>
    <button type="submit">ลงทะเบียน</button>
    <br>
    <a href="login.php">เข้าสู่ระบบ</a>
    </form>
            </div>
        </div>
    </div>
</body>
</html>