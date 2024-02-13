<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../config/style.css">
</head>
<body>
    <div class="sidebar">
        <h2>ยินดีต้อนรับ</h2>
        <h6>ร้านอาหาร สั่งซื้อออนไลน์</h6>
        <ul>
            <li><a class="<?php echo $url == "profile"?"active":""; ?>" href="profile.php"><img class="img-hide" src="../config\icon\admin.png">&nbsp;<span>ข้อมูลส่วนตัว</span></a></li>
            <li><a class="<?php echo $url == "food"?"active":""; ?>" href="food.php"><img class="img-hide" src="../config\icon\addFood.png">&nbsp;<span>อาหาร</span></a></li>
            <li><a class="<?php echo $url == "cart"?"active":""; ?>" href="cart.php"><img class="img-hide" src="../config\icon\basket.png">&nbsp;<span>ตะกร้า</span></a></li>
            <li><a class="<?php echo $url == "status"?"active":""; ?>" href="status.php"><img class="img-hide" src="../config\icon\food-delivery.png">&nbsp;<span>รายการสั่งซื้อ</span></a></li>
            <li><a class="<?php echo $url == "history"?"active":""; ?>" href="history.php"><img class="img-hide" src="../config\icon\inspect.png">&nbsp;<span>ประวัติการสั่งอาหาร</span></a></li>
            <li class=""><a onclick="return confirm('คุณต้องการออกจากระบบ')" class="btn-logout" href="logout.php"><img class="img-hide" src="../config/icon/logout.png" >&nbsp;<span>ออกจากระบบ</span></a></li>
        </ul>
    </div>
</body>
</html>