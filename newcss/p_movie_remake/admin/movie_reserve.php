<?php
$url = 'reserve';

require_once 'header.php';
$log = $db->select('reserve');
if (isset($_GET['YES'])) {
    $where = array(
        're_id' => $_GET['YES']
    );
    $fields = array(
        'status_seat' => '1'
    );
    $update = $db->update('reserve', $fields, $where);
    alert('อนุญาติเรียบร้อย');
    redirect('movie_reserve.php');
}
if (isset($_GET['NO'])) {
    $where = array(
        're_id' => $_GET['NO']
    );
    $fields = array(
        'status_seat' => '0'
    );
    $update = $db->update('reserve', $fields, $where);
    alert('ปฏิเสธเรียบร้อย');
    redirect('movie_reserve.php');
}

?>

<body>
<h2>การจองที่นั่ง</h2>
<br>
<br>
<center>
                <h2>ที่นั่ง</h2>
                <img src="../assets/img/6597b5098a5ed.jpg" width="400px" height="600px">
                </center>
<div class="d-fixed">
<?php
            foreach($log as $row){
            $where = array(
                'user_id' => $row['user_id']
            );
            $where2 = array(
                'seat_id' => $row['seat_id']
            );
                $log3 = $db->selectwhere('seat',$where2);
                foreach ($log3 as $row3);
                $log2 = $db->selectwhere('users',$where);
                foreach ($log2 as $row2) ;
                $where4 = array(
                    'movie_id' => $row['movie_id']
                );
            $log4 = $db->selectwhere('movie', $where4);
            foreach($log4 as $row4);
            ?>
                <br>

    <div class="box-fixed">
                    <div class="form-content">
                    <div class="img-center">
                    <img src="<?php echo $row2['profile'] ?>" width="250px" height="250px">
                    </div>
                    <br>
        <p><b>ชื่อ/นามสกุล :</b><?php echo $row2['fname']." ".$row2['lname']; ?></p>
        <p><b>ภาพยนตร์ :</b><?php echo $row4['movie_name'] ?></p>
        <p><b> ที่นั่ง :</b><?php echo $row['seat_id'] ?></p>
        <p><b>  กลุ่มที่นั่ง :</b><?php echo $row3['seat_group'] ?></p>
        <p><b>สถานะใช้งาน :</b><?php echo ($row['status_seat'] == '1') ? 'อนุญาติเเล้ว' : 'รอการอนุญาติ';
                        ?></p>
                        <br>
                            <?php if ($row['status_seat'] == '0') { ?>
                                <a class="btn btn-w100" href="?YES=<?php echo $row['re_id'] ?>" class="btn_submit">อนุญาติ</a>
                            <?php } else { ?>
                                <a class="btn btn-w100" href="?NO=<?php echo $row['re_id'] ?>" class="btn_delete">ปฏิเสธ</a>
                            <?php    } ?>
                    </div>
                    </div>
        <?php }
                 ?>
    
</div>
</body>

</html>