<?php
$url = "movie";
require_once 'header.php'; 
$log = $db->select('movie');
if(isset($_GET['del'])){
    $where = array(
        'movie_id' => $_GET['del']
    );
    $log = $db->delete('movie', $where);
    if($log){
        alert('ลบเรียบร้อย');
        redirect('movie.php');
    }

}
?>
<body>
    <a class= "btn-dodgerblueshort" href="seat_add.php">เพิ่มที่นั่ง</a>
    <a class="btn-dodgerblueshort" href="movie_add.php">เพิ่มภาพยนตร์</a>
    <br>
    <h1>ภาพยนตร์</h1>
    <br>
<div class="d-fixed">
    <?php foreach($log as $row){
        $where2 = array(
            'theater_id' => $row['theater_id'],
        );
        $log2 = $db->selectwhere('theater', $where2);
        foreach($log2 as $row2);
        ?>
        <div class="box-fixed boxset-form">
            <div class="form-style">
                 <div class="img-center">
                 <img src="<?php echo $row['poster'] ?>" width="100%" height="270px">
                 </div>
        <p><b>ชื่อภาพยนตร์ :</b><?php echo $row['movie_name'] ?></p>
        <p><b>เวลาเริ่มการฉาย :</b><?php echo $row['movie_time_start'] ?></p>
        <p><b>เวลาสิ้นสุดการฉาย :</b><?php echo $row['movie_time_end'] ?></p>
        <p><b>โรงฉาย :</b><?php echo $row2['theater_name'] ?></p>
       <br>
            </div>

            <a class="btn-dodgerblue btn-w100" href="seat.php?id=<?php echo $row['movie_id'] ?>">ที่นั่งภาพยนตร์</a>
            <br>
            <a class="btn-yellow btn-w100" href="movie_edit.php?id=<?php echo $row['movie_id'] ?>">เเก้ไข</a>
            <br>
        <a class="btn-red btn-w100" href="?del=<?php echo $row['movie_id'] ?>">ลบ</a>
        </div>
           <br>
           <br>
    <?php } ?>
</div>
</body>
</html>