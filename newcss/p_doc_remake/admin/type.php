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
        alert('ลบประเภทเรียบร้อย');
        redirect('type.php');
    }
}
?>
<body>
    <br>
    <a class="btn-dodgerblue" href="type_add.php">เพิ่มประเภทเอกสาร</a>
    <br>
    <br>
    <h2>ประเภทเอกสาร</h2>

<div class="d-fixed">
<?php
 foreach($log as $row){
?>      
    <div class="box-fixed box-items">
        <div class="form-style">
   <p><b>ประเภทเอกสาร :</b><?php echo $row['type_name'] ?></p> 
   
    </div>
    <br>
    <a class="btn-yellow btn-w100" href="type_edit.php?id=<?php echo $row['type_id'] ?>">เเก้ไข</a>
    <br>
   <a class="btn-red btn-w100" href="?del=<?php echo $row['type_id'] ?>">ลบ</a>
</div>
<?php } ?>
</div>
</body>
</html>