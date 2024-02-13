<?php 

$url = "profile";
require_once 'header.php'; 

$where = array(
    'user_id' => $_SESSION['user_id_admin'],
);
$log = $db->selectwhere('users', $where);
foreach($log as $row);

if(isset($_POST['email'])){
    if(!empty($_FILES['img']['name'])){
        $file = $db->upload($_FILES['img'], $path = 'assets/img');
    }else{
        $file = $row['profile'];
    }
    $fields = array(
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'email' => $_POST['email'],
        'tell' => $_POST['tell'],
        'address' => $_POST['address'],
        'profile' => $file,
    );
    $update = $db->update('users', $fields, $where);
    if($update){
        alert('เเก้ไขข้อมูลส่วนตัวเรียบร้อย');
        redirect('profile.php');
    }
}
?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-login">
            <h2>เเก้ไขข้อมูลส่วนตัว</h2>
            <form method="post" enctype="multipart/form-data" >
                <!-- <img src="" alt=""> -->
            <center>
                <p>โปรไฟล์</p>
                <input type="file" name="img"  > 
            </center>
                <p>ชื่อ</p>
                <input type="text" name="fname" required placeholder="ชื่อ" value="<?php echo $row['fname'] ?>">
                <p>นามสกุล</p>
                <input type="text" name="lname" required placeholder="นามสกุล" value="<?php echo $row['lname'] ?>">
                <p>อีเมล</p>
                <input type="email" name="email" required placeholder="อีเมล" value="<?php echo $row['email'] ?>">
                <p>เบอร์โทรศัพท์</p>
                <input type="text" name="tell" required placeholder="เบอร์โทรศัพท์" value="<?php echo $row['tell'] ?>">
                <p>ที่อยู่</p>
                <input type="text" name="address" required placeholder="ที่อยู่" value="<?php echo $row['address'] ?>">
                <br><br>
                <button class="btn btn-w100" type="submit">
                    เเก้ไขข้อมูลส่วนตัว
                </button>
                <br>
            </form>
        </div>
    </div>
</div>

</body>
</html>