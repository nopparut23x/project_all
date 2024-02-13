<?php

$url = "order";
require_once 'header.php';
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM orders WHERE user_id = $id AND status < 4 ";
$log = mysqli_query($db->db, $sql);

   

?>
<body>
    
    <?php foreach($log as $row){ ?>
    <table>
<tr>
    <th>เมนูอาหาร</th>
    <th>ราคา</th>
    <th>จำนวน</th>
    <th>รวมราคา</th>
</tr>
    <?php
      $where3 = array(
        'order_id' => $row['order_id']
    );
    $log3 = $db->selectwhere('order_items',$where3);
    foreach($log3 as $row3){

    $where2 = array(
        'food_id' => $row3['food_id']
    );

    $log2 = $db->selectwhere('food', $where2);
    foreach($log2 as $row2);
 
            ?>
                <tr>
        <td><?php echo $row2['food_name'] ?></td>
        <td><?php echo $row2['price_food'] ?></td>
        <td><?php echo $row3['quantity'] ?></td>
        <td><?php echo $row3['price_food'] ?></td>
        </tr>

    <?php  }  ?>
    <tr style="background-color:#D4D4D4;">
        <td>รวมทั้งหมด</td>
        <td><?php echo $row['total']; ?></td>
        
        <td><?php echo $row['pay'] == '1'?"ชำระเงินเเล้ว <a class='btn-dodgerblue' target='_blank' href='{$row['pay_file']}'>ดูหลักฐาน</a>":"ชำระเงินปลายทาย"; ?></td>
        <td><?php switch($row['status']){
            case"1":
              echo "<p>กำลังทำเมนูอาหาร</p>"  ;
            break;
            case"2":
                echo "<p>รอไรเดอร์เขารับเมนูอาหาร</p>"  ;
              break;
              case"3":
                echo "<p>กำลังจัดส่งจากไรเดอร์</p>"  ;
              break;
              case"4":
                echo "<p>จัดส่งเรียบร้อย</p>";
              break;
}
 ?>
</td>
    </tr>
    </table>
    <br>
    <?php } if(empty($row)){
    echo "<h2>ไม่มีรายการ</h2>";
    exit();
} ?>
</body>
</html>