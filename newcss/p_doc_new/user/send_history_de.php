<?php
$url = "send_history_de";
require_once 'header.php';


if(isset($_GET['type'])){
    $where = array(
        'user_id_se' => $_SESSION['user_id'],
        'type_id' => $_GET['type']
    );
}else{
    $where = array(
        'user_id_se' => $_SESSION['user_id'],
    );
}

$log = $db->selectwhere('department_send', $where);
if(isset($_GET['del'])){
    $where_delete = array(
        'de_se_id' => $_GET['del']
    );
    $delete = $db->delete('department_send', $where_delete);
    if($delete){
        alert('ลบเรียบร้อย');
        redirect('send_history_de.php');
    }
}
$type = $db->select('type');

?>
<body>
<?php
    foreach($type as $row_type){ ?>
    <a class="btn-dodgerblue" href="?type=<?php echo $row_type['type_id'] ?>"><?php echo $row_type['type_name'] ?></a>
    <?php } ?>
<h2>เอกสารที่ส่งให้เเผนก</h2>
<div class="d-fixed">
    <?php foreach($log as $row){ 
        $where2 = array(
            'de_id' => $row['department_id_re']
        );
        $log2 = $db->selectwhere('department',$where2);
        foreach($log2 as $row2);
        $where3 = array(
            'type_id' => $row['type_id']
        );
        $log3 = $db->selectwhere('type', $where3);
        foreach($log3 as $row3);
         ?>
<div class="box-fixed box-items">
    <div class="form-style">
<p><b>ชื่อบุคคลที่รับ </b> <?php echo  $row2['de_name'] ?></p>
<p><b>ประเภทเอกสาร </b> <?php echo  $row3['type_name']?></p>
<p><b>ข้อความ </b> <?php echo  $row['text'] ?></p>
<p><b>เวลาที่ส่ง </b> <?php echo  $row['time_send'] ?></p>

    </div>
    <br>
    <a class="btn-dodgerblue btn-w100" href="<?php echo $row['file'] ?>" target="__blank">ดูเอกสาร</a>
    <br>
<a class="btn-red btn-w100" onclick="return confirm('คุณต้องการลบ?')" href="?del=<?php echo $row['de_se_id'] ?>">ยกเลิก</a>
    </div>
        <?php } ?>
        </div>
</body>
</html>