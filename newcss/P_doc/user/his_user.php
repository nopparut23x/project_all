<?php 
$url = "his_user";
require_once 'header.php';
$where = array(
    'user_id_se' => $_SESSION['user_id']
);
$log = $db->selectwhere('send_user', $where);
if(isset($_GET['del'])){
    $delete_w =array(
        'send_id_user' => $_GET['del'],
    );
    $delete = $db->delete('send_user', $delete_w);
    if($delete){
        alert('ยกเลิกการส่งเอกสารเรียบร้อย');
        redirect('his_user.php');
    }

}
?>
<body>
    <h2>เอกสารที่ส่ง</h2>
    <div class="d-fixed">
    <?php foreach($log as $row){ 
        $type = array(
            'type_id' => $row['type_id'],
        );
        $user_where = array(
            'user_id' => $row['user_id_re'],
        );
        $l_type = $db->selectwhere('type', $type);
        $l_user = $db->selectwhere('users', $user_where);
        foreach($l_type as $row_t);
        foreach($l_user as $row_u);
        
        ?>
        <div class="box-fixed" style="width:350px">
    <div class="form-content">
    <div class="img-center">
            <img src="<?php echo $row_u['profile'] ?>" style="widht:200px; height:200px;">
            </div>
            <br>
            <p><b>อีเมล: </b><?php echo $row_u['email'] ?></p>
            <p><b>บุคลากรที่รับ: </b><?php echo $row_u['fname']." ".$row_u['lname'] ?></p>
            <p><b>เวลาที่ส่ง: </b><?php echo $row['time_send'] ?></p>
            <p><b>ข้อความที่ส่งถึง: </b><?php echo $row['text'] ?></p>
            <br>
            <div style="display:flex; justify-content:center; gap:6px;">
            <a class="btn btn-w100" target="__blank" href="<?php echo $row['file'] ?>">ดูเอกสาร</a>
            <a class="btn btn-w100" onclick="return confirm('คุณต้องการยกเลิกเอกสาร?')"  href="?del=<?php echo $row['send_id_user'] ?>">ยกเลิก</a>
            </div>
            </div>
    </div>
        <?php } ?>
        </div>
        
</body>
</html>