<?php 
$url = "re_department";
require_once 'header.php';
if(isset($_GET['del'])){
    $wd = array(
        'send_de_id' => $_GET['del']
    );
    $lo = $db->delete('send_department', $wd);
    if($lo){
        alert('ลบเอกสารเรียบร้อย');
        redirect('send_department.php');
    }
}
if(isset($_GET['type'])){
    $wt = array(
        'type_id' => $_GET['type']
    );
$log = $db->selectwhere('send_department' , $wt);
    
}else{
    $log = $db->select('send_department');

}
$t = $db->select('type');

?>
<body>

    <h2>เอกสารที่รับ</h2>
    <div class="dropdown">
        <button>ประเภทเอกสาร</button>
        <div class="dropdown-content">
        <?php foreach($t as $tr){ ?>
        <a href="?type=<?php echo $tr['type_id'] ?>"><?php echo $tr['type_name'] ?></a>
        <?php } ?>
        </div>
    </div>
    <br>

    <br>
    

<div class="d-fixed jcc">

    <?php foreach($log as $row){ 
        $type = array(
            'type_id' => $row['type_id'],
        );
        $user_where = array(
            'user_id' => $row['user_id_se'],
        );
        $de_where = array(
            'de_id' => $row['de_id_se'],
        );
        $de_where2 = array(
            'de_id' => $row['de_id_re'],
        );
        $l_type = $db->selectwhere('type', $type);
        $l_user = $db->selectwhere('users', $user_where);
        $l_de = $db->selectwhere('department', $de_where);
        $l_de2 = $db->selectwhere('department', $de_where2);
        foreach($l_type as $row_t);
        foreach($l_user as $row_u);
        foreach($l_de as $de);
        foreach($l_de2 as $de2);
        ?>
             <div class="box-fixed" style="width:350px;">
            <div class="form-content">
            <div class="img-center">
           <img src="<?php echo $row_u['profile'] ?>" style="widht:200px; height:200px;">
           </div>
        <p><b>อีเมล: </b><?php echo $row_u['email'] ?></p>
        <p><b>บุคลากรที่ส่ง: </b><?php echo $row_u['fname']." ".$row_u['lname'] ?></p>
        <p><b>เเผนกที่ส่ง: </b><?php echo $de['de_name'] ?></p>
        <p><b>เเผนกที่รับ: </b><?php echo $de2['de_name'] ?></p>
        <p><b>เวลาที่ส่ง: </b><?php echo $row['time_send'] ?></p>
        <p><b>ข้อความที่ส่งถึง: </b><?php echo "xxxxxxxxx" ?></p>
        <p><b>ประเภท: </b><?php echo $row_t['type_name'] ?></p>
        <br>
        <div style="display:flex; justify-content:center; gap:6px">
        <a class="btn" style="width:50%;" target="__blank" href="<?php echo $row['file'] ?>">ดูเอกสาร</a>
        <a class="btn" style="width:50%;" onclick="return confirm('คุณต้องการลบเอกสาร?')" href="?del=<?php echo $row['send_de_id']; ?>">ลบ</a>
        </div>
    </div>
    </div>
        <?php } ?>
</body>
</html>