<?php 
$url = "profile";
require_once 'header.php';
$where = array(
    'user_id' => $_SESSION['user_id'],
);
$log = $db->selectwhere('users', $where);
foreach($log as $row);
$where3 = array(
    'de_id' => $row['de_id']
);
$log3 = $db->selectwhere('department', $where3);
foreach($log3 as $row3);

if(isset($_POST['fname'])){
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
        alert('เเก้ไขเรียบร้อย');
        redirect('profile.php');
    }
}
$log2 = $db->select('department');
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <form method="post" enctype="multipart/form-data">
<h2>เเก้ไขข้อมูลส่วนตัว</h2>   
<center>
    <input type="file" name="img" >
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
<br><br>
<label for="department_id">เเผนกวิชา</label>
<select name="department" id="department_id">
<option value="<?php echo $row3['de_id'] ?>"><?php echo $row3['de_name'] ?></option>
    <?php foreach($log2 as $row2){ 
        if($row2['de_id'] == $row3['de_id']){}else{?>
        <option value="<?php echo $row2['de_id'] ?>"><?php echo $row2['de_name'] ?></option>
        <?php } } ?>
</select>
<br>
<br>
<button type="submit">
    เเก้ไขข้อมูลส่วนตัว
</button>
</form> 
            </div>
        </div>
    </div>
</body>
</html>