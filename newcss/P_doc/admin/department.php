<?php
$url = "department";
require_once "header.php";

$log = $db->select('department');
if(isset($_GET['del'])){
    $where = array(
        'de_id' => $_GET['del']
    );
    $delete = $db->delete('department', $where);
    if($delete){
        alert('ลบเรียบร้อย');
        redirect('department.php');       
    }
}
?>
<body>
    <h2>จัดการเเผนกวิชา</h2>
    <a class="btn" href="department_add.php">เพิ่มเเผนกวิชา</a>
    <br>
    <br>
    <br>
<div class="d-fixed jcc">
    <?php
    foreach($log as $row){
    ?>
    <div class="box-fixed" style="width:350px;"> 
        <div class="form-content">
    <p><b>เเผนก: </b><?php echo $row['de_name']; ?> </p>
    <hr>
    <br>
        <div style="display:flex; justify-content:center; gap:6px;">
        <a class="btn" style="width:50%;" href="department_edit.php?id=<?php echo $row['de_id'] ?>">เเก้ไข</a>
        <a class="btn" style="width:50%;" href="?del=<?php echo $row['de_id'] ?>">ลบ</a>
        </div>
        </div></div>
    <?php } ?>
    </div>
</body>
</html>