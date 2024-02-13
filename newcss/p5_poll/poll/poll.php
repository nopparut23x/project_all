<?php
$url = 'poll';
require_once 'header.php';

$log = $db->select("poll");
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
        <img src="<?php echo $row['img'] ?>">
        </div>
        <br>
        <p><b>เเบบสำรวจ : </b><?php echo $row['poll_name']; ?></p>
        <p><b>ประเภทเเบบสำรวจ : </b><?php echo $row2['type_name']; ?></p>
        <br>
        <a class="btn btn-w100" href="doing.php?id=<?php echo $row['poll_id'] ?>" >ทำเเบบสำรวจ</a>
        </div>
        </div>
<?php    } ?>
</div>
</body>
</html>