<?php
$url = "score_vote";
require_once 'header.php';
if(isset($_GET['win'])){
    $sql = "SELECT *, SUM(score) as sum FROM score  
    JOIN vote ON score.vote_id = vote.vote_id
    GROUP BY vote.vote_id 
    ORDER BY sum DESC";
}elseif(isset($_GET['lose'])){
    $sql = "SELECT *, SUM(score) as sum FROM score  
    JOIN vote ON score.vote_id = vote.vote_id
    GROUP BY vote.vote_id
    ORDER BY sum ASC";

}else{
    $sql = "SELECT *, SUM(score) as sum FROM score  
    JOIN vote ON score.vote_id = vote.vote_id
    GROUP BY vote.vote_id";
}
$result = mysqli_query($db->db, $sql);



?>
<body>
<h2>ผลการโหวต</h2>

    <a class="a2-btn" style="display:inline;" href="?win">คะเเนนมากที่สุด</a>
    <a class="a2-btn" style="display:inline;" href="?lose">คะเเนนน้อยที่สุด</a>
    <br>
    <br>

<div class="d-fixed">

    <?php foreach($result as $row){ ?>
        <div class="box-fixed" style="width:340px">
        <div class="form-content">

        <div class="img-center" >
            <img src="<?php echo $row['img'] ?>" >
        </div>
        <br>

        <h2><b>เบอร์ </b> <?php echo $row['number'] ?></h2>
        <p><b>พรรค </b><?php echo $row['party'] ?> </p>
        <p><b>คะเเนนที่ได้ :</b> <?php echo $row['sum'] ?></p>
        <p><b>ชื่อหัวหน้าพรรค :</b> <?php echo $row['name_boss'] ?></p>
        <p><b>นโยบาย :</b><?php echo $row['policy'] ?> </p>
        <p><b>เวลาเริ่มโหวต :</b><?php echo $row['time_start'] ?> </p>
        <p><b>เวลาปิดการโหวต :</b> <?php echo $row['time_end'] ?></p>
        </div>
        </div>

        <?php } ?>
        </div>
</body>
</html>