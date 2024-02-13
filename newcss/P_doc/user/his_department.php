<?php 
$url = "his_department";
require_once 'header.php';
$where = array(
    'user_id_se' => $_SESSION['user_id']
);
$log = $db->selectwhere('send_department', $where);
if(isset($_GET['del'])){
    $delete_w =array(
        'send_id_user' => $_GET['del'],
    );
    $delete = $db->delete('send_user', $delete_w);
    if($delete){
        alert('ยกเลิกการส่งเอกสารเรียบร้อย');
        redirect('his_department.php');
    }

}
?>
<body>
    <h2>เอกสารที่ส่ง</h2>
    <div class="d-fixed">
    <div class="box-fixed" style="width:350px">
    <div class="form-content">
    <?php foreach($log as $row){ 
        $type = array(
            'type_id' => $row['type_id'],
        );
        $user_where = array(
            'de_id' => $row['de_id_re'],
        );
        $l_type = $db->selectwhere('type', $type);
        $l_user = $db->selectwhere('department', $user_where);
        foreach($l_type as $row_t);
        foreach($l_user as $row_u); ?>
        
            <p><b>เเผนกที่รับ: </b><?php echo $row_u['de_name']?></p>
            <p><b>เวลาที่ส่ง: </b><?php echo $row['time_send'] ?></p>
            <p><b>ข้อความที่ส่งถึง: </b><?php echo $row['text'] ?></p>
            <br>
            <div style="display:flex; justify-content:center; gap:6px;">
            <a class="btn btn-w100" target="__blank" href="<?php echo $row['file'] ?>">ดูเอกสาร</a>
            <a class="btn btn-w100" onclick="return confirm('คุณต้องการยกเลิกเอกสาร?')"  href="?del=<?php echo $row['send_de_id'] ?>">ยกเลิก</a>
            </div>
            <?php } ?>
</body>
</html>