<?php
$url = "theater";
require_once 'header.php'; 
$theater = $db->select('theater');
if(isset($_POST['movie'])){
    $fields = array(
        'movie_name' => $_POST['movie'] 
    );
    $log = $db->selectwhere('movie',$fields);
    if(!empty($log[0])){
        alert('มีภาพยนตร์นี้เเล้ว');
        redirect('movie.php');
    }else{
        if(!empty($_FILES['img']['name'])){
            $file = $db->upload($_FILES['img'], $path = 'assets/img');
            }
            $fields = array(
                'poster' => $file,
                'movie_name' =>$_POST['movie'],
                'movie_time_start' =>$_POST['time_start'],
                'movie_time_end' =>$_POST['time_end'],
                'theater_id' => $_POST['theater'],
            );
    $insert = $db->insert('movie', $fields);
    if($insert){
        alert('เพิ่มเรียบร้อย');
        redirect('theater.php');
    }
}

}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-content">
            <form method="post" enctype="multipart/form-data">
        <h2>เพิ่มภาพยนตร์</h2>
        <center>
        <p>โปสเตอร์</p>
            <input type="file" name="img" required>
        </center>
        <p>ชื่อภาพยนตร์</p>
        <input type="text" name="movie" required placeholder="ชื่อภาพยนตร์">
        <p>เวลาเริ่มฉายภาพยนตร์</p>
        <input type="datetime-local" name="time_start" required placeholder="ชื่อภาพยนตร์">
        <p>เวลาสิ้นสุดการฉาย</p>
        <input type="datetime-local" name="time_end" required placeholder="ชื่อภาพยนตร์">
        <br>
        <p>เลือกโรงที่จะฉาย</p>
        <select name="theater">
        <?php foreach($theater as $row){ ?>
            <option value="<?php echo $row['theater_id'] ?>"><?php echo $row['theater_name'] ?></option>
            <?php } ?>
        </select>
            <br><br>
        <button class="btn btn-w100" type="submit">
           เพิ่มภาพยนตร์
        </button>
    </form>
            </div>
        </div>
    </div>
</body>
</html>