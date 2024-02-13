<?php 
$url = "profile";
require_once 'header.php';
$where = array(
    'user_id' => $_SESSION['user_id'],
);
$log = $db->selectwhere('users', $where);
foreach($log as $row);

if(isset($_POST['email'])){
    if(!empty($_FILES['img']['name'])){
        $file = $db->upload($_FILES['img'], $path="assets/img");
    }else{
        $file = $row['profile'];
    }
    $fields = array(
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'tell' => $_POST['tell'],
            'profile' => $file,
    );
    $update = $db->update('users', $fields , $where);
    if($update){
        alert('เเก้ไขข้อมูลเรียบร้อย');
        redirect('profile.php');
    }
}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <form method="post" enctype="multipart/form-data">
                <h1>เเก้ไขข้อมูลส่วนตัว</h1>
                <center>
                    <input type="file" name="img">
                </center>
                <p>ชื่อ</p>
                <input type="text" name="fname" value="<?php echo $row['fname'] ?>" placeholder="ชื่อ">
                <p>นามสกุล</p>
                <input type="text" name="lname" value="<?php echo $row['lname'] ?>" placeholder="นามสกุล">
                <p>อีเมล</p>
                <input type="email" name="email" value="<?php echo $row['email'] ?>" placeholder="อีเมล">
                <p>ที่อยู่</p>
                <input type="text" name="address" value="<?php echo $row['address'] ?>" placeholder="ที่อยู่">
                <p>เบอร์โทร</p>
                <input type="text" name="tell" value="<?php echo $row['tell'] ?>" placeholder="เบอร์โทร">
                <br>
                <br>
                <button type="submit" onclick="return confirm('คุณต้องการเเก้ไข้อมูลส่วนตัว?')">
                    เเก้ไขข้อมูลส่วนตัว
                </button>
                <br><br>
            </form>
            </div>
        </div>
    </div>
</body>
</html>