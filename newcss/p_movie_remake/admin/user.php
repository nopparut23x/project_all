<?php
$url = "user";
require_once 'header.php';
$where = array(
    'usg_status' => 'user'
);
$log = $db->selectwhere('users', $where);
if(isset($_GET['on'])){
    $fields = array(
        'status' => '1'
    );
     $where = array(
        'user_id' => $_GET['on']
     );
     $update = $db->update('users', $fields, $where);
     if($update){
        alert('อนุญาติเข้าใช้งาน');
        redirect('user.php');
     }
}
if(isset($_GET['off'])){
    $fields = array(
        'status' => '0'
    );
     $where = array(
        'user_id' => $_GET['off']
     );
     $update = $db->update('users', $fields, $where);
     if($update){
        alert('ระงับการใช้งานเรียบร้อย');
        redirect('user.php');
     }
}
?>
<body>
    <h1 class="text-header">ผู้ใช้งานระบบ</h1>
<div class="d-fixed">
    <?php foreach($log as $row){ ?>
    <div class="box-fixed boxset-form">
        <div class="form-content">
        <div class="img-center">
        <img src="<?php echo $row['profile'] ?>" width="100%" height="270px">
        </div>
        <br>
        <br>
    <div class="content-frame">
    <p><b>ชื่อ :</b><?php echo $row['fname'] ?></p>
    <p><b>นามสกุล :</b><?php echo $row['lname'] ?></p>
    <p><b>อีเมล :</b><?php echo $row['email'] ?></p>
    <p><b>ที่อยู่ :</b><?php echo $row['address'] ?></p>
    <p><b>เบอร์โทร :</b><?php echo $row['tell'] ?></p>
    </div>
    <br>
    <?php echo $row['status'] == '1'?"<a class='btn btn-w100'  href='?off={$row['user_id']}'>ระงับการเข้าใช้งาน</a>":"<a class='btn btn-w100' href='?on={$row['user_id']}'>อนุญาติเข้าใช้งาน</a>"; ?>
    <br>
    </div>
        </div>
    <?php } ?>
</div>
</body>
</html>