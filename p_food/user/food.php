<?php
$url = "food";
require_once 'header.php';
if(isset($_GET['id'])){
    $where_ty = array(
        'ca_id' => $_GET['id']
    );
    $log = $db->selectwhere('food', $where_ty);
}else{
    $log = $db->select('food');
}
$log2 = $db->select('category');
?>
<body>
    <?php
    foreach($log2 as $row3){?>
    <a class="btn-dodgerblueshort" href="?id=<?php echo $row3['ca_id'] ?>"><?php echo $row3['ca_name'] ?></a>
   <?php }
    ?>
    <h1>เมนูอาหาร</h1>
<br>
<div class="d-fixed">
    <?php foreach($log as $row){ 
        $where = array(
            'ca_id' => $row['ca_id'],
        );
        $log2 = $db->selectwhere('category', $where);
        foreach($log2 as $row2);
        ?>
        <div class="box-fixed" style="width:280px;">
            <div class="form-fixed">
        <img src="<?php echo $row['img'] ?>" width="240px" height="200px">
        <p><b>เมนูอาหาร : </b> <?php echo $row['food_name'] ?></p>
        <p><b>ราคาอาหาร : </b> <?php echo $row['price_food'] ?></p>
        <p><b>ประเภทอาหาร : </b> <?php echo $row2['ca_name'] ?></p>
        <?php
        if($row['status'] == '1'){?>
        <p><b>สถานะอาหาร : </b>พร้อม</p>
        <a class="btn-dodgerblue" href="food_select.php?id=<?php echo $row['food_id'] ?>">เลือก</a>
     <?php   }else{?>
        <p><b>สถานะอาหาร : </b>วัตถุดิบไม่พร้อม</p>
      <?php  }
        ?>
        <br>
            </div>
        </div>
        <?php } ?>
    
</div>
</body>
</html>