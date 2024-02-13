
<?php
$url = "vote";
require_once 'header.php'; 

if(isset($_POST['number'])){
    $where = array(
        'vote_number' => $_POST['number'],
    );
    $log = $db->selectwhere('vote', $where);
    if(!empty($log[0])){
        alert('เลขนี้ถูกใช้งานเเล้ว');
        redirect('vote_add.php');
    }else{

    $fields = array(
        'vote_number' => $_POST['number'],
        'msg' => $_POST['msg'],
        'time_start' => $_POST['time_start'],
        'time_end' => $_POST['time_end'],
    );
    $insert = $db->insert('vote', $fields);
    if($insert){
        alert('เพิ่มการเลือกตั้งเรียบร้อย');
        redirect('vote.php');
    }
}
    
}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <form method="post">
                <h1>เพิ่มการเลือกตั้ง</h1>
            <p>เลขที่โหวต</p>
            <input type="number" name="number" required placeholder="เลขที่โหวต" min="1">
            <p>นโยบาย</p>
            <input type="text" name="msg" required placeholder="นโยบาย" min="1">
            <p>เวลาเริ่มโหวต</p>
            <input type="datetime-local" name="time_start" required placeholder="เวลาเริ่มโหวต">
            <p>เวลาสิ้นสุด</p>
            <input type="datetime-local" name="time_end" required placeholder="เวลาสิ้นสุด">
            <br><br>
            <button type="submit">
                เพิ่มการเลือกตั้ง
            </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>