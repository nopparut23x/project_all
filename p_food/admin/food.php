<?php
$url = "food";
require_once 'header.php';
$log = $db->select('food');
if(isset($_GET['del'])){
    $where = array(
        'food_id' => $_GET['del']
    );
    $delete = $db->delete('food', $where);
    if($delete){
        alert('ลบหมวดหมู่เรียบร้อย');
        redirect('food.php');
    }
}
if(isset($_GET['status1'])){
    $where = array(
        'food_id' => $_GET['status1']
    );
    $fields = array(
        'status' => '0'
    );
    $update = $db->update('food',$fields ,$where);
    if($update){
        alert('เปลี่ยนเเปลงเรียบร้อย');
        redirect('food.php');
    }
}
if(isset($_GET['status2'])){
    $where = array(
        'food_id' => $_GET['status2']
    );
    $fields = array(
        'status' => '1'
    );
    $update = $db->update('food',$fields ,$where);
    if($update){
        alert('เปลี่ยนเเปลงเรียบร้อย');
        redirect('food.php');
    }
}
?>
<body>
    <h1>เมนูอาหาร</h1>
    
    <a class="btn-dodgerblue" href="food_add.php">เพิ่มเมนูอาหาร</a>
<br>
<div class="d-fixed">
    <?php foreach($log as $row){ 
        $where = array(
            'ca_id' => $row['ca_id'],
        );
        $log2 = $db->selectwhere('category', $where);
        foreach($log2 as $row2);
        ?>
        <div class="box-fixed">
            <div class="form-fixed">
        <img src="<?php echo $row['img'] ?>" width="242px" height="200px">
        <p><b>เมนูอาหาร : </b> <?php echo $row['food_name'] ?></p>
        <p><b>ราคาอาหาร : </b> <?php echo $row['price_food'] ?></p>
        <p><b>ประเภทอาหาร : </b> <?php echo $row2['ca_name'] ?></p>
        <p><b>สถานะอาหาร : </b> <?php echo $row['status'] == '1'?"พร้อม":"วัตถุดิบไม่พร้อม"; ?></p>
        <br>
            </div>
            <a class="btn-dodgerblue" href="food_edit.php?id=<?php echo $row['food_id'] ?>">เเก้ไขอาหาร</a>
        <?php echo $row['status'] == '1'?"<a class='btn-dodgerblue' href='?status1={$row['food_id']}'>วัตถุดิบไม่พร้อม</a>" : "<a class='btn-dodgerblue' href='?status2={$row['food_id']}'>พร้อมขาย</a>";  ?>
        
        <a class="btn-dodgerblue" href="?del=<?php echo $row['food_id'] ?>">ลบ</a>
        </div>
        <?php } ?>
</body>
</html>