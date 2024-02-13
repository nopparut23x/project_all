
<?php
$url = "vote";
require_once 'header.php'; 
$where2 = array(
    'vote_id' => $_GET['id'],
);
$log1 = $db->selectwhere('vote', $where2);
foreach($log1 as $row);
if(isset($_POST['number'])){
    $fields = array(
        'vote_number' => $_POST['number'],
        'msg' => $_POST['msg'],
        'time_start' => $_POST['time_start'],
        'time_end' => $_POST['time_end'],
    );
    $update = $db->update('vote', $fields ,$where2);
    if($update){
        alert('เเก้ไขการเลือกตั้งเรียบร้อย');
        redirect('vote.php');
    }
}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <form method="post">
                <h1>เเก้ไขการเลือกตั้ง</h1>
            <p>เลขที่โหวต</p>
            <input type="number" name="number" required placeholder="เลขที่โหวต" min="1" value="<?php echo $row['vote_number'] ?>">
            <p>นโยบาย</p>
            <input type="text" name="msg" required placeholder="นโยบาย" min="1" value="<?php echo $row['msg'] ?>">
            <p>เวลาเริ่มโหวต</p>
            <input type="datetime-local" name="time_start" required placeholder="เวลาเริ่มโหวต" value="<?php echo $row['time_start'] ?>">
            <p>เวลาสิ้นสุด</p>
            <input type="datetime-local" name="time_end" required placeholder="เวลาสิ้นสุด" value="<?php echo $row['time_end'] ?>">
            <br><br>
            <button type="submit">
                เเก้ไขการเลือกตั้ง
            </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>