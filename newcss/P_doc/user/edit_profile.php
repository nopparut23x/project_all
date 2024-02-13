<?php 
$url ="profile";

require_once 'header.php'; 

$where = array(
    'user_id' => $_SESSION['user_id'],
);
$log = $db->selectwhere('users', $where);
foreach($log as $row);
$where2 = array(
    'de_id' => $row['de_id']
);
$log2 = $db->selectwhere('department', $where2);
foreach($log2 as $row2);



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
        'de_id' => $_POST['de_name']
    );
    $update = $db->update('users', $fields, $where);
    if($update){
        alert('เเก้ไขข้อมูลส่วนตัวเรียบร้อย');
        redirect('profile.php');
    }
}
$log3 = $db->select('department');
?>
<body>
<div class="d-center">
    <div class="box-fixed" style="width:500px">
    <div class="form-content">
<h2>เเก้ไขข้อมูลส่วนตัว</h2>
    <form method="post" enctype="multipart/form-data" >
    <div class="img-center">
            <img src="../assets\img\65b6ba8a39edc.png" alt="" style="width:200px; height:200px;">
        </div>
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
        <br>
    <label for="">เเผนกวิชา</label>
    <select name="de_name">
<option selected value="<?php echo $row2['de_id'] ?>"><?php echo $row2['de_name'] ?></option>
        <?php foreach($log3 as $row3){ if($row3['de_id'] == $row2['de_id']){}else{ ?>
<option value="<?php echo $row3['de_id'] ?>"><?php echo $row3['de_name'] ?></option>
    <?php } } ?>
    </select>
    <br>
    <br>
<button class="btn btn-w100" type="submit">
    เเก้ไขข้อมูลส่วนตัว
</button>
    </form>

</body>
</html>