<?php
$url = "status";
require_once 'header.php';
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM orders WHERE user_id = $id AND status < 4 ";
$log = mysqli_query($db->db, $sql);

   if(isset($_GET['cookie1'])){
    $where = array(
      'order_id' => $_GET['cookie1']
    );
    $fields = array(
      'status' => 2
    );
    $update = $db->update('orders', $fields, $where);
    if($update){
      alert('อัพเดทเรียบร้อย');
      redirect('status.php');
    }
   }
   if(isset($_GET['cookie2'])){
    $where = array(
      'order_id' => $_GET['cookie2']
    );
    $fields = array(
      'status' => 3
    );
    $update = $db->update('orders', $fields, $where);
    if($update){
      alert('อัพเดทเรียบร้อย');
      redirect('status.php');
    }
   }
   if(isset($_GET['cookie3'])){
    $where = array(
      'order_id' => $_GET['cookie3']
    );
    $fields = array(
      'status' => 4
    );
    $update = $db->update('orders', $fields, $where);
    if($update){
      alert('อัพเดทเรียบร้อย');
      redirect('status.php');
    }
   }

?>
<body>
    <h1>การสั่งอาหาร</h1>
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
        
        <td><?php echo $row['pay'] == '1'?"ชำระเงินเเล้ว <a href='{$row['pay_file']}'>ดูหลักฐาน</a>":"ชำระเงินปลายทาย"; ?></td>
        
        <td><?php switch($row['status']){
            case"1":
              echo "<p>กำลังทำเมนูอาหาร</p> <a href='?cookie1={$row['order_id']}'>อัพเดทสถานะ</a>"  ;
            break;
            case"2":
                echo "<p>รอไรเดอร์เขารับเมนูอาหาร</p> <a href='?cookie2={$row['order_id']}'>อัพเดทสถานะ</a>"  ;
              break;
              case"3":
                echo "<p>กำลังจัดส่งจากไรเดอร์</p> <a href='?cookie3={$row['order_id']}'>อัพเดทสถานะ</a>"  ;
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