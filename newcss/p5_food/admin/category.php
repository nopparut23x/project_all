<?php
$url = "category";
require_once 'header.php';
$log = $db->select('category');

if(isset($_GET['del'])){
    $where = array(
        'ca_id' => $_GET['del']
    );
    $delete = $db->delete('category', $where);
    $delete = $db->delete('food', $where);
    if($delete){
        alert('ลบหมวดหมู่เรียบร้อย');
        redirect('category.php');
    }
}
?>
<body>
    <h1>หมวดหมู่อาหาร</h1>
    <a class="a-out" href="category_add.php">เพิ่มหมวดหมู่อาหาร</a>
    <br>
    <br>
    <div class="d-fixed jcc">




        <?php foreach($log as $row){ ?>
            <div class="box-fixed boxsm">
            <div class="form-content">
            <p><b>ชื่อหมวดหมู่อาหาร :</b><?php echo $row['ca_name'] ?></p>
            <br>
            <div class="btn-between">
            <a href="?del=<?php echo $row['ca_id'] ?>">ลบ</a>
            <a href="category_edit.php?id=<?php echo $row['ca_id'] ?>">เเก้ไข</a>
            </div>
            </div>
        </div>
            <?php } ?>
            </div>
</body>
</html>