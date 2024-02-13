<?php
$url = "report";
require_once 'header.php';
$date = date('Y-m-d H:i:s');
if(isset($_GET['desc'])){
    $sql = "SELECT * , SUM(score.score) AS sum FROM score
JOIN vote ON score.vote_id = vote.vote_id 
GROUP BY vote.vote_id 
ORDER By sum DESC";
}elseif(isset($_GET['asc'])){
    $sql = "SELECT * , SUM(score.score) AS sum FROM score
    JOIN vote ON score.vote_id = vote.vote_id 
    GROUP BY vote.vote_id 
    ORDER By sum ASC ";
}else{
    $sql = "SELECT * , SUM(score.score) AS sum FROM score
JOIN vote ON score.vote_id = vote.vote_id 
GROUP BY vote.vote_id ";
}
$result = mysqli_query($db->db, $sql);


?>
<body>
    <h2>ผลการโหวต</h2>
    <a class="a-out" href="?desc">ผลคะเเนนเยอะที่สุด</a>
    <a class="a-out" href="?asc">ผลคะเเนนน้อยที่สุด</a>
    <br>
    <br>
    <div class="d-fixed">
    <?php foreach($result as $row){ 
             if($row['time_start'] > $date){
                $status = 'ยังไม่ได้เริ่มการโหวต';
            }elseif($row['time_end'] < $date){
                $status = 'การโหวตสิ้นสุดเเล้ว';
             }else{
                $status = "กำลังเปิดโหวต";
             }
        
        
        ?>
        <div class="box-fixed">
            <div class="form-sumvote">
        <div class="img-noneradius">
        <img src="<?php echo $row['img'] ?>" width="300px" hegith="300px">
        </div>
        <h2 style="color=<?php echo $row['user_id'] == $_SESSION['user_id']?"red":""; ?>"><b>เบอร์ </b><?php echo $row['vote_number']?></h2>
        <h2><b>คะเเนน  </b><?php echo $row['sum']?></h2>
        <p><b>ชื่อพรรค : </b><?php echo $row['fullname']?></p>
        <p><b>นโยบาย : </b><?php echo $row['policy']?></p>
        <p><b>เวลาเริ่มเลือกตั้ง : </b><?php echo $row['time_start']?></p>
        <p><b>เวลาสิ้นสุด : </b><?php echo $row['time_end']?></p>
        <?php
        echo $status;
        ?>
        <br>
        </div>
        </div>
        <?php } ?>
        </div>
</body>
</html>