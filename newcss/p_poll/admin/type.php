<?php
$url = "type";
require_once 'header.php';
$log = $db->select('type');
if(isset($_GET['del'])){
    $where = array(
        'type_id' => $_GET['del']
    );
    $log2 = $db->delete('type', $where);
    if($log2){
        alert('ลบปรเภทเรียบร้อย');
        redirect('type.php');
    }
}
?>
<body>
    <br>
    <a class="a-btn" href="type_add.php">เพิ่มประเภทเเบบสำรวจ</a>
    <br>
    <br>
    <h2>ประเภทเเบบสำรวจ</h2>

<div class="d-fixed jcc">
<?php 
 foreach($log as $row){
?>      
    <div class="box-fixed " style="width:250px; ">
        <div class="form-style">
   <p><b>ประเภทเเบบสำรวจ :</b><?php echo $row['type_name'] ?></p> 
   
    </div>
    <br>
    <a class="btn" href="type_edit.php?id=<?php echo $row['type_id'] ?>">เเก้ไข</a>
    <br>
   <a class="btn" href="?del=<?php echo $row['type_id'] ?>">ลบ</a>
</div>
<?php } ?>
</div>
</body>
</html>