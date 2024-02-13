<?php 
$url = "profile";
require_once 'header.php';
$where = array(
    'user_id' => $_SESSION['user_id'],
 );
 $log = $db->selectwhere('users', $where);
 foreach($log as $row);


if(isset($_POST['save'])){
        if(!empty($_FILES['img']['name'])){
            $file = $db->upload($_FILES['img'], $path = 'assets/img');
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
        $update = $db->update('users', $fields, $where);
        if($update){
            alert('เเก้ไขข้อมูลส่วนตัวเรียบร้อย');
            redirect('profile.php');
        }
    }

?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form" style="width:700px">
        <div class="form-register">
            
        <div class="img-center">
            <img src="../assets/img/man.png" width="200px">
        </div>
    <form method="post" enctype="multipart/form-data">
        <h2>เเก้ไขข้อมูลส่วนตัว</h2>
        <center>
            <input type="file" name="img">
        </center>
        <p>ชื่อ</p>
        <input type="text" name="fname" required placeholder="ชื่อ"  value="<?php echo $row['fname'] ?>">
        <p>นามสกุล</p>
        <input type="text" name="lname" required placeholder="นามสกุล" value="<?php echo $row['lname'] ?>">
        <p>อีเมล</p>
        <input type="email" name="email" required placeholder="อีเมล" value="<?php echo $row['email'] ?>">
        <p>ที่อยู่</p>
        <input type="text" name="address" required placeholder="ที่อยู่" value="<?php echo $row['address'] ?>">
        <p>เบอร์โทรศัพท์</p>
        <input type="text" name="tell" required placeholder="เบอร์โทรศัพท์" value="<?php echo $row['tell'] ?>">
        <br>
        <br>
        <button class="btn" type="submit" name="save">
            เเก้ไขข้อมูลส่วนตัว
        </button>
        <br>
    </form>
</div>
</div>
</div>
</body>
</html>