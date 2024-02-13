<?php
$url = "user";
require_once 'header.php';
$where = array(
    'usg_status' => 'user'
);
$log = $db->selectwhere('users', $where);
if(isset($_GET['on'])){
    $where = array(
        'user_id' => $_GET['on']
    );
    $fields = array(
        'status' => 1
    );
    $update = $db->update('users',$fields , $where);
    if($update){
        alert('อนุญาติเข้าใช้งานเรียบร้อย');
        redirect('user.php');
    }
}
if(isset($_GET['off'])){
    $where = array(
        'user_id' => $_GET['off']
    );
    $fields = array(
        'status' => 0
    );
    $update = $db->update('users',$fields , $where);
    if($update){
        alert('ระงับเข้าใช้งานเรียบร้อย');
        redirect('user.php');
    }
}
?>
<body>
   <div class="d-fixed">
    <div class="box-fixed boxcard-form">
        <div class="form-content">
        <h2>จัดการผู้ใช้งาน</h2>
    <?php foreach($log as $row){ 

        ?>
        <div class="img-center">
        <img src="<?php echo $row['profile'] ?>" width="200px" height="200px">
        </div>
        <br>
    <p><b>ชื่อ : </b><?php echo $row['fname'] ?></p>
    <p><b>นามสกุล : </b><?php echo $row['lname'] ?></p>
    <p><b>อีเมล : </b><?php echo $row['email'] ?></p>
    <p><b>เบอร์โทรศัพท์ : </b><?php echo $row['tell'] ?></p>
    <p><b>ที่อยู่ : </b><?php echo $row['address'] ?></p>
    <br>
    <?php echo $row['status'] == "1"?"<a class='btn btn-w100' href='?off={$row['user_id']}'>ระงับการใช้งาน</a>":"<a class='btn btn-w100' href='?on={$row['user_id']}'>อนุญาติใช้งาน</a>"; ?>
        <?php } ?>
        </div>
    </div>
   </div>
</body>
</html>