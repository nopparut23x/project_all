<?php 
$url = "poll";
require_once 'header.php';
$where = array(
    'user_id' => $_SESSION['user_id_user']
);
$log = $db->selectwhere("poll", $where);
if(isset($_GET['del'])){
    $delete = array(
        'poll_id' => $_GET['del']
    );
    $de = $db->delete('poll', $delete);
    if($de){
        alert('ลบเเบบสำรวจเรียบร้อย');
        redirect('poll.php');
    }
}
?>
<body>
    <h2>จัดการเเบบสำรวจ</h2>
    <a class="btn-short" href="poll_add.php">เพิ่มเเบบสำรวจ</a>
    <br>
    <br>
<div class="d-fixed">
    <?php foreach($log as $row){
        $type = array(
            'type_id' => $row['type_id'],
        );
        $log2 = $db->selectwhere('type', $type);
        foreach($log2 as $row2);
        ?>
        <div class="box-fixed boxcard-form">
            <div class="form-content">
        <div class="img-center">
        <img src="<?php echo $row['img'] ?>" width="300px" height="300px">
        </div>
        <br>
        <p><b>เเบบสำรวจ : </b><?php echo $row['poll_name']; ?></p>
        <p><b>ประเภทเเบบสำรวจ : </b><?php echo $row2['type_name']; ?></p>
        <br>
        <a href="report.php?id=<?php echo $row['poll_id'] ?>" >ดูเเบบผลเเบบสำรวจ</a>
        <br>
        <div class="d-flex jcc gap">
        <a class="btn w-50" href="poll_edit.php?id=<?php echo $row['poll_id'] ?>" >เเก้ไข</a>
        <a class="btn w-50" href="?del=<?php echo $row['poll_id'] ?>" >ลบ</a>
        </div>
        </div>
        </div>
<?php    } ?>
</div>
</body>
</html>