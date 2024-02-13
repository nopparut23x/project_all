<?php
$url = "type";
require_once 'header.php';
$log = $db->select("type");
if(isset($_GET['del'])){
    $delete = array(
        'type_id' => $_GET['del']
    );
    $de = $db->delete('type', $delete);
    if($de){
        alert('ลบประเภทเเบบสำรวจเรียบร้อย');
        redirect('type.php');
    }
}
?>
<body>
    <h2>จัดการประเภทเเบบสำรวจ</h2>
    <a class="btn-short" href="type_add.php">เพิ่มประเภทเเบบสำรวจ</a>
    <br>
    <br>
    <div class="d-fixed">
    <?php foreach($log as $row){ ?>
        <div class="box-fixed boxcard-form">
            <div class="form-content">
        <p><b>ประเภทเเบบสำรวจ : </b><?php echo $row['type_name']; ?></p>
        <br>
        <div class="d-flex jcc gap">
        <a class="btn w-50" href="type_edit.php?id=<?php echo $row['type_id'] ?>" >เเก้ไข</a>
        <a class="btn w-50" href="?del=<?php echo $row['type_id'] ?>" >ลบ</a>
        </div>
        </div>
        </div>
<?php    } ?>
    </div>
    
</body>
</html>