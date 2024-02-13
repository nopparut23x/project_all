<?php
$url = 'history';
require_once 'header.php';
if(isset($_GET['re'])){
    $data = array(
        'seat_id' => $_GET['re'],
        'user_id' => $_SESSION['user_id']
    );
    $where_updata = array(
        'seat_id' => $_GET['re']
    );
    $where_delete = array(
        'seat_id' => $_GET['re']
    );
    $updata = array(
        'status' => '0'
    );

    $updata2 = $db->update('seat',$updata,$where_updata);
    $save = $db->delete('reserve',$where_delete);
    if($updata2){
        alert('ยกเลิกเรียบร้อย');
        redirect('history.php');
    }
}
?>

<body>
        <center>
            <h1>ผังที่นั่ง</h1>
            <img src="../assets/img/6597b5098a5ed.jpg" width="400px" height="600px">
        </center>
    <h2>ที่นั่งภาพยนตร์</h2>
        <br>
<div class="d-fixed">
        <?php
        $log2 = $db->selectwhere('reserve', ['user_id' => $_SESSION['user_id']]);
        if(empty($log2[0])){
            echo "<p>ไม่มีรายการจอง</p>";
            exit();
        }
        foreach ($log2 as $row){
        $movie = $db->selectwhere('movie' , ['movie_id' => $row['movie_id']]);
        foreach($movie as $row_movie);
        $theater = $db->selectwhere('theater',['theater_id' => $row_movie['theater_id']]);
        foreach($theater as $row_theater);
        $log3 = $db->selectwhere('seat', ['seat_id' => $row['seat_id']]);
        foreach ($log3 as $row2); ?>
        <div class="box-fixed boxset-form">
                <div class="form-style">
            <div class="img-center">
            <img src="<?php echo $row_movie['poster'] ?>" width="100%" height="270px">
            </div>
            <p><b>ชื่อภาพยนตร์ :</b><?php echo $row_movie['movie_name'] ?></p>
            <p><b>เลขที่นั่ง :</b><?php echo $row2['seat_number'] ?></p>
            <p><b>เลขที่นั่ง :</b><?php echo $row2['seat_number'] ?></p>
            <p><b>โรงฉาย :</b><?php echo $row_theater['theater_name'] ?></p>
            <p><b>สถานะ :</b> <?php echo ($row['status_seat'] == '0') ? ' <b>รอการยืนยัน</b>' : '<b>กำลังใช้งาน</b>';
                    ?></p>
                      <br>
          <br>
        </div>
            <a class="btn-red btn-w100" href="?re=<?php echo $row2['seat_id'] ?>">ยกเลิก</a>
        </div>
        <?php }  ?>
</div>
</div>
</body>

</html>