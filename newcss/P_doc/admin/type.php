<?php
$url = "type";
require_once 'header.php';
$log = $db->select('type');
if(isset($_GET['del'])){
    $where = array(
        'type_id' => $_GET['del']
    );
    $delete = $db->delete('type', $where);
    if($delete){
        alert('ลบประเภทเอกสารเรียบร้อย');
        redirect('type.php');
    }
}
?>
<body>
    <h2>จัดการประเภทเอกสาร</h2>
<a class="btn" href="type_add.php">เพิ่มประเภทเอกสาร</a>
<br>
<br><br>
<div class="d-fixed jcc">
    <?php foreach($log as $row){ ?>
    <div class="box-fixed" style="width:350px;">
        <div class="form-content">
    <p><b>ชื่อประเภท </b> <?php echo $row['type_name'] ?> </p>
    <hr>
    <br>
    <div style="display:flex; justify-content:center; gap:6px;">
    <a class="btn" style="width:50%;" href="type_edit.php?id=<?php echo $row['type_id'] ?>">เเก้ไข</a>
    <a class="btn" style="width:50%;" href="?del=<?php echo $row['type_id'] ?>">ลบ</a>
    </div>
    </div>
    </div>
    <?php } ?>
    </div>
</body>
</html>