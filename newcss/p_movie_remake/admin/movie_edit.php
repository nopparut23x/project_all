<?php
$url = "theater";
require_once 'header.php';
$where =array(
    'movie_id' => $_GET['id']
); 
$log = $db->selectwhere('movie', $where);
foreach($log as $row);
$where2 = array(
    'theater_id' => $row['theater_id']
);
$log2 = $db->selectwhere('theater', $where2);
foreach($log2 as $row3);
$theater = $db->select('theater');
if(isset($_POST['movie'])){
    $fields = array(
        'movie_name' => $_POST['movie'] 
    );
    $log = $db->selectwhere('movie',$fields);
        if(!empty($_FILES['img']['name'])){
            $file = $db->upload($_FILES['img'], $path = 'assets/img');

            }else{
                $file = $row['poster'];
            }



            $fields = array(
                'poster' => $file,
                'movie_name' =>$_POST['movie'],
                'movie_time_start' =>$_POST['time_start'],
                'movie_time_end' =>$_POST['time_end'],
                'theater_id' => $_POST['theater'],
            );
    $insert = $db->update('movie', $fields, $where);
    if($insert){
        alert('เเก้ไขเรียบร้อย');
        redirect('theater.php');
    }
}

?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-content">
            <form method="post" enctype="multipart/form-data">
        <h2>เเก้ไขภาพยนตร์</h2>
        <center>
        <p>โปสเตอร์</p>
            <input type="file" name="img" >
        </center>
        <p>ชื่อภาพยนตร์</p>
        <input type="text" name="movie" required placeholder="ชื่อภาพยนตร์" value="<?php echo $row['movie_name'] ?>">
        <p>เวลาเริ่มฉายภาพยนตร์</p>
        <input type="datetime-local" name="time_start" required placeholder="ชื่อภาพยนตร์" value="<?php echo $row['movie_time_start'] ?>">
        <p>เวลาสิ้นสุดการฉาย</p>
        <input type="datetime-local" name="time_end" required placeholder="ชื่อภาพยนตร์" value="<?php echo $row['movie_time_end'] ?>">
        <br>
        <p>เลือกโรงที่จะฉาย</p>
        <select name="theater">
        <option value="<?php echo $row3['theater_id'] ?>"><?php echo $row3['theater_name'] ?></option>
        <?php foreach($theater as $row2){
            if($row3['theater_id'] == $row2['theater_id']){}else{ ?>
            <option value="<?php echo $row2['theater_id'] ?>"><?php echo $row2['theater_name'] ?></option>
            <?php } }?>
        </select>
            <br><br>
        <button class="btn btn-w100" type="submit">
           เเก้ไขภาพยนตร์
        </button>
    </form>
            </div>
        </div>
    </div>
</body>
</html>