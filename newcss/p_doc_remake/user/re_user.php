<?php
$url = "re_user";
require_once 'header.php';


if(isset($_GET['type'])){
    $where = array(
        'user_id_re' => $_SESSION['user_id'],
        'type_id' => $_GET['type'],
    );
}else{
    $where = array(
        'user_id_re' => $_SESSION['user_id'],
    );
}



$log = $db->selectwhere('user_send', $where);
$type = $db->select('type');
?>
<body>
<div class="dropdown">
                <p>ประเภทเอกสาร <strong>›</strong></p>
            <div class="dropdown-content">
            <?php
            foreach($type as $row_type){ ?>
            <a class="btn-dodgerblue" href="?type=<?php echo $row_type['type_id'] ?>"><?php echo $row_type['type_name'] ?></a>
            <?php } ?>
            </div>
</div>

<h2>เอกสารที่รับจากบุคคล</h2>
<div class="d-fixed" >
    <?php foreach($log as $row){ 
        $where2 = array(
            'user_id' => $row['user_id_se']
        );
        $log2 = $db->selectwhere('users',$where2);
        foreach($log2 as $row2);
        $where3 = array(
            'type_id' => $row['type_id']
        );
        $log3 = $db->selectwhere('type', $where3);
        foreach($log3 as $row3);
         ?>
    <div class="box-fixed box-items">
        <div class="form-style">
    <img src="<?php echo $row2['profile'] ?>" width="200px" height="200px">
<p><b>ชื่อบุคคลที่ส่ง </b> <?php echo  $row2['fname']." ". $row2['lname'] ?></p>
<p><b>ประเภทเอกสาร </b> <?php echo  $row3['type_name']?></p>
<p><b>ข้อความ </b> <?php echo  $row['text'] ?></p>
<p><b>เวลาที่ส่ง </b> <?php echo  $row['time_send'] ?></p>




</div>
<br>
<a class="btn-dodgerblue btn-w100" href="<?php echo $row['file'] ?>" target="__blank">ดูเอกสาร</a>

</div>
        <?php } ?>
    </div>
</body>
</html>