<?php 
$url = "re_user";
require_once 'header.php';
if(isset($_GET['type'])){
    $wher = array(
        'type_id' => $_GET['type']
    );
    $log = $db->selectwhere('send_user', $wher);
}else{
    $log = $db->select('send_user');
}




if(isset($_GET['del'])){
    $wd = array(
        'send_id_user' => $_GET['del']
    );
    $lo = $db->delete('send_user', $wd);
    if($lo){
        alert('ลบเอกสารเรียบร้อย');
        redirect('re_user.php');
    }
}


$t = $db->select('type');

?>
<body>

    <h2>เอกสารที่ส่งให้บุคลากร</h2>
    <br>
    <div class="dropdown">
        <button>ประเภทเอกสาร</button>
        <div class="dropdown-content">
        <?php foreach($t as $tr){ ?>
        <a href="?type=<?php echo $tr['type_id'] ?>"><?php echo $tr['type_name'] ?></a>
        <?php } ?>
        </div>
    </div>
    <br>
<div class="d-fixed jcc">
    <?php foreach($log as $row){ 
        $type = array(
            'type_id' => $row['type_id'],
        );
        $user_where = array(
            'user_id' => $row['user_id_se'],
        );
        $user_where2 = array(
            'user_id' => $row['user_id_re'],
        );
        $l_type = $db->selectwhere('type', $type);
        $l_user = $db->selectwhere('users', $user_where);
        $l_user2 = $db->selectwhere('users', $user_where2);
        foreach($l_type as $row_t);
        foreach($l_user as $row_u);
        foreach($l_user2 as $row_u2);
        ?>
        <div class="box-fixed" style="width:350px;">
            <div class="form-content">
           <div class="img-center">
           <img src="<?php echo $row_u['profile'] ?>" style="widht:200px; height:200px;">
           </div>
        <p><b>อีเมล: </b><?php echo $row_u['email']." ถึง ".$row_u2['email'] ?></p>
        <p><b>บุคลากรที่ส่ง: </b><?php echo $row_u['fname']." ".$row_u['lname'] ?></p>
        <p><b>บุคลากรที่รับ: </b><?php echo $row_u2['fname']." ".$row_u2['lname'] ?></p>
        <p><b>เวลาที่ส่ง: </b><?php echo $row['time_send'] ?></p>
        <p><b>ข้อความที่ส่งถึง: </b><?php echo "xxxxxxxxxxxxx"?></p>
        <p><b>ประเภทเอกสาร: </b><?php echo $row_t['type_name'] ?></p>
        <br>
        <div style="display:flex; justify-content:center; gap:6px;">
        <a class="btn" style="width:50%;" target="__blank" href="<?php echo $row['file'] ?>">ดูเอกสาร</a>
        <a class="btn" style="width:50%;" onclick="return confirm('คุณต้องการลบเอกสาร?')" href="?del=<?php echo $row['send_id_user']; ?>">ลบ</a>
        </div>
        </div>
        </div>
        <?php } ?>
        </div>
</body>
</html>