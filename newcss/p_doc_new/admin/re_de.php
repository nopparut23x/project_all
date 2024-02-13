<?php
$url = "re_de";
require_once 'header.php';

if(isset($_GET['type'])){
    $where = array(
        'type_id' => $_GET['type'],
    );
$log = $db->selectwhere('department_send', $where);
}else{
    $log = $db->select('department_send');
}
$type = $db->select('type');
?>
<body>
    <?php
    foreach($type as $row_type){ ?>
    <a class="btn-dodgerblue" href="?type=<?php echo $row_type['type_id'] ?>"><?php echo $row_type['type_name'] ?></a>
    <?php } ?>
<h2>เอกสารที่รับจากเเผนก</h2>
<div class="d-fixed">
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
        $where4 = array(
            'de_id' => $row['department_id_se']
        );
        $log4 = $db->selectwhere('department', $where4);
        foreach($log4 as $row4);
        $where5 = array(
            'de_id' => $row['department_id_re']
        );
        $log5 = $db->selectwhere('department', $where5);
        foreach($log5 as $row5);

         ?>
    <div class="box-fixed box-items">
        <div class="form-style">
    <div class="img-center">
        <img src="<?php echo $row2['profile'] ?>"  width="250px" height="250px" style="border-radius:50%;">
    </div>
    <br>
    <br>
    <hr>
    <br>
<p><b>ชื่อบุคคลที่ส่ง </b> <?php echo  $row2['fname']." ". $row2['lname'] ?></p>
<p><b>เเผนกที่ส่ง </b> <?php echo  $row4['de_name']?></p>
<p><b>เเผนกที่รับ </b> <?php echo  $row5['de_name']?></p>
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