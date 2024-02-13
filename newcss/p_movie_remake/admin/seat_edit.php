<?php
$url = 'theater';


require_once 'header.php';

if(isset($_GET['id'])){
    $where = array(
        'seat_id' => $_GET['id']
    );
    $log = $db->selectwhere('seat' ,$where);
    foreach($log as $row);
}
if(isset($_POST['save'])){
    $fields = array(
        'seat_number' => $_POST['seat_number'],
        'seat_group' => $_POST['seat_group'],
    );
    $save = $db->update('seat', $fields, $where);
    if($save){
        alert('เเก้ไขที่นั้งเรียบร้อย');
        redirect("seat.php?id={$_GET['movie_id']}");
    }

}
?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-content">
<form method="post" enctype="multipart/form-data">
<center>
            <h2>ที่นั่งภาพยนตร์</h2>
        </center>
        <p>เลขที่นั่ง</p>
        <input type="text" name="seat_number" required value="<?php echo $row['seat_number'] ?>">
        <p>กลุ่มที่นั่ง</p>
        <input type="text" name="seat_group" required value="<?php echo $row['seat_group'] ?>">
        <br>
        <br>
        <button class="btn btn-w100" type="submit" name="save">
            เเก้ไขที่นั่ง
        </button>
    </form>
    </div>
    </div>
    </div>
    
</body>
</html>