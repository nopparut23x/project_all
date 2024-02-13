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
    <div class="dropdown">
        <button>หมวดหมู่อาหาร</button>
        <div class="dropdown-content">
            <?php
            foreach($log2 as $row3){?>
            <a href="?id=<?php echo $row3['ca_id'] ?>"><?php echo $row3['ca_name'] ?></a>
            <?php }
            ?>
        </div>
    </div>
    <h1>เมนูอาหาร</h1>
<br>
<div class="d-fixed jcc">
    



    <?php foreach($log as $row){ 
        $where = array(
            'ca_id' => $row['ca_id'],
        );
        $log2 = $db->selectwhere('category', $where);
        foreach($log2 as $row2);
        ?>
        <div class="box-fixed boxsm">
        <div class="form-content">
        <div class="img-poster">
        <img src="<?php echo $row['img'] ?>" width="200px" height="200px">
        </div>
        <p><b>เมนูอาหาร : </b> <?php echo $row['food_name'] ?></p>
        <p><b>ราคาอาหาร : </b> <?php echo $row['price_food'] ?></p>
        <p><b>ประเภทอาหาร : </b> <?php echo $row2['ca_name'] ?></p>
        <?php
        if($row['status'] == '1'){?>
        <p><b>สถานะอาหาร : </b>พร้อม</p>
        <br>
        <a class="a-btn" href="food_select.php?id=<?php echo $row['food_id'] ?>">เลือก</a>
     <?php   }else{?>
        <p><b>สถานะอาหาร : </b>วัตถุดิบไม่พร้อม</p>
      <?php  }
        ?>
        </div>
    </div>
        <?php } ?>
        </div>
</body>
</html>