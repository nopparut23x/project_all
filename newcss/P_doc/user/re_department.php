<?php 
$url = "re_department";
require_once 'header.php';
$user = array(
    'user_id' => $_SESSION['user_id']
);
$lo = $db->selectwhere('users', $user);

foreach($lo as $r);
if(isset($_GET['type'])){
    $where = array(
        'de_id_re' => $r['de_id'],
        'type_id' => $_GET['type']
    );
    $log = $db->selectwhere('send_department', $where);
}else{
    $where = array(
        'de_id_re' => $r['de_id']
    );
    $log = $db->selectwhere('send_department', $where);
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
        $l_type = $db->selectwhere('type', $type);
        $l_user = $db->selectwhere('users', $user_where);
        $l_de = $db->selectwhere('department', $de_where);
        foreach($l_type as $row_t);
        foreach($l_user as $row_u);
        foreach($l_de as $de);
        ?>
           <div class="box-fixed" style="width:350px;">
            <div class="form-content">
           <div class="img-center">
            <img src="<?php echo $row_u['profile'] ?>" style="widht:200px; height:200px;">
    </div>
        <p><b>อีเมล: </b><?php echo $row_u['email'] ?></p>
        <p><b>บุคลากรที่ส่ง: </b><?php echo $row_u['fname']." ".$row_u['lname'] ?></p>
        <p><b>เเผนกที่ส่ง: </b><?php echo $de['de_name'] ?></p>
        <p><b>เวลาที่ส่ง: </b><?php echo $row['time_send'] ?></p>
        <p><b>ข้อความที่ส่งถึง: </b><?php echo $row['text'] ?></p>
        <p><b>ประเภท: </b><?php echo $row_t['type_name'] ?></p>
        <br>
        <a class="btn btn-w100" target="__blank" href="<?php echo $row['file'] ?>">ดูเอกสาร</a>
        </div>
        </div>
        <?php } ?>
    </div>  
</body>
</html>