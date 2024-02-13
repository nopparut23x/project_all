<?php
$url = "department";
require_once 'header.php';
$log = $db->select('department');
if(isset($_GET['del'])){
    $where = array(
        'de_id' => $_GET['del']
    );
    $log2 = $db->delete('department', $where);
    $log3 = $db->delete('users', $where);
    if($log2){
        alert('ลบเเผนกเรียบร้อย');
        redirect('department.php');
    }
}
?>
<body>
    <br>
    <a class="btn-dodgerblue" href="department_add.php">เพิ่มเเผนกวิชา/งานอื่นๆ</a>
    <h2>เเผนกวิชา/งานอื่นๆ</h2>
    <br>
<div class="d-fixed">
<?php
 foreach($log as $row){
?> 
    <div class="box-fixed box-items">
        <div class="form-style">
   <p><b>เเผนกวิชา :</b><?php echo $row['de_name'] ?></p> 
   
    </div>
    <br>
    <a class="btn-yellow btn-w100" href="department_edit.php?id=<?php echo $row['de_id'] ?>">เเก้ไข</a>
    <br>
   <a class="btn-red btn-w100" href="?del=<?php echo $row['de_id'] ?>">ลบ</a>
   </div>
<?php } ?>
</div>
</body>
</html>