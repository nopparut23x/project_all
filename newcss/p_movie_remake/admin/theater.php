<?php
$url = 'theater';

require_once 'header.php'; 
$theater = $db->select('theater');
if(isset($_GET['del'])){
    $where = array(
        'theater_id' => $_GET['del']
    );
    $theater = $db->delete('theater', $where);
    $theater2 = $db->delete('movie', $where);
    if($theater){
        alert('ลบเรียบร้อย');
        redirect('theater.php');
    }

}
require_once 'movie.php';
?>
<body>
    <h1 class="text-header">โรงฉายภาพยนตร์</h1>
    <br>
    <a class= "btn" href="theater_add.php">เพิ่มโรงฉายภาพยนตร์</a>
    <a class= "btn" href="seat_add.php">เพิ่มที่นั่ง</a>
    <a class="btn" href="movie_add.php">เพิ่มภาพยนตร์</a>
    <br>
    <br>
<div class="d-fixed " style="justify-content:center;">
    <?php foreach($theater as $row){?>
        <div class="box-fixed boxset-form">
            <div class="" style="">
            <div class="form-content">
                <div style="display:flex; gap:6px;">
                <p style=""><b>โรงฉาย :</b><?php echo $row['theater_name'] ?></p>
                <a  class="btn"  href="theater_edit.php?id=<?php echo $row['theater_id'] ?>">เเก้ไข</a>
                <a class="btn"  href="?del=<?php echo $row['theater_id'] ?>">ลบ</a>
                </div>
           </div>
            </div>
        </div>
    <?php } ?>
</div>
<br>
<br>
<div style="border-top:1px solid gray;">
    
<br>         
    <h1 class="text-header">ภาพยนตร์</h1>
    <br>
<div class="d-fixed" style="justify-content:center;">
    <?php foreach($log as $row){
        $where2 = array(
            'theater_id' => $row['theater_id'],
        );
        $log2 = $db->selectwhere('theater', $where2);
        foreach($log2 as $row2);
        ?>
        <div class="box-fixed boxset-form">
            <div class="form-content">
                 <div style="display:flex; justify-content:center;">
                 <img src="<?php echo $row['poster'] ?>" width="250px" height="250px">
                 </div>
                 <center>
        <h2><b>ชื่อภาพยนตร์ :</b><?php echo $row['movie_name'] ?></h2>
        
        <p><b>เวลาเริ่มการฉาย :</b><?php echo $row['movie_time_start'] ?></p>
        <p><b>เวลาสิ้นสุดการฉาย :</b><?php echo $row['movie_time_end'] ?></p>
        <p><b>โรงฉาย :</b><?php echo $row2['theater_name'] ?></p>
        </center>
       <br>
            </div>

            <a class="btn btn-w100" href="seat.php?id=<?php echo $row['movie_id'] ?>">ที่นั่งภาพยนตร์</a>
            <br>    
            <div style="display:flex; gap:6px;">
            <a class="btn btn-w50"  href="movie_edit.php?id=<?php echo $row['movie_id'] ?>">เเก้ไข</a>
            <a class="btn btn-w50"  href="?del=<?php echo $row['movie_id'] ?>">ลบ</a>
            </div>
        </div>
           <br>
           <br>
    <?php } ?>
</div>
</div>
</body> 
</html>