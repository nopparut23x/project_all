<?php
$url = "category";
require_once 'header.php';
$log = $db->select('category');

if(isset($_GET['del'])){
    $where = array(
        'ca_id' => $_GET['del']
    );
    $delete = $db->delete('category', $where);
    if($delete){
        alert('ลบหมวดหมู่เรียบร้อย');
        redirect('category.php');
    }
}
?>
<body>
    <h1>หมวดหมู่อาหาร</h1>
    <a class="btn-dodgerblue" href="category_add.php">เพิ่มหมวดหมู่อาหาร</a>
<div class="d-fixed">
        <?php foreach($log as $row){ ?>
            <div class="box-fixed lock-box">
                <div class="form-fixed">
                    <br>
            <p><b>ชื่อหมวดหมู่อาหาร :</b><?php echo $row['ca_name'] ?></p>
                </div>
                <br>
                <a class="btn-dodgerblue" href="?del=<?php echo $row['ca_id'] ?>">ลบ</a>
            <a class="btn-dodgerblue" href="category_edit.php?id=<?php echo $row['ca_id'] ?>">เเก้ไข</a>
            </div>
            <?php } ?>
            
</div>
</body>
</html>