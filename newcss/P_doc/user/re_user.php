<?php 
$url = "re_user";
require_once 'header.php';
if(isset($_GET['type'])){
    $where = array(
        'user_id_re' => $_SESSION['user_id'],
        'type_id' => $_GET['type']
    );
    $log = $db->selectwhere('send_user', $where);
}else{
    $where = array(
        'user_id_re' => $_SESSION['user_id']
    );
    $log = $db->selectwhere('send_user', $where);
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
    <div class="d-fixed">

    <?php foreach($log as $row){ 
        $type = array(
            'type_id' => $row['type_id'],
        );
        $user_where = array(
            'user_id' => $row['user_id_se'],
        );
        $l_type = $db->selectwhere('type', $type);
        $l_user = $db->selectwhere('users', $user_where);
        foreach($l_type as $row_t);
        foreach($l_user as $row_u);
        ?>
            <div class="box-fixed" style="width:350px">
    <div class="form-content">
    <div class="img-center">
            <img src="<?php echo $row_u['profile'] ?>" style="width:200px; height:200px;">
            </div>
            <p><b>อีเมล: </b><?php echo $row_u['email'] ?></p>
            <p><b>บุคลากรที่ส่ง: </b><?php echo $row_u['fname']." ".$row_u['lname'] ?></p>
            <p><b>เวลาที่ส่ง: </b><?php echo $row['time_send'] ?></p>
            <p><b>ข้อความที่ส่งถึง: </b><?php echo $row['text'] ?></p>
            <p><b>ประเภทเอกสาร: </b><?php echo $row_t['type_name'] ?></p>
            <br>
            <a class="btn btn-w100" target="__blank" href="<?php echo $row['file'] ?>">ดูเอกสาร</a>
            </div>
    </div>

        <?php } ?>
        </div>
</body>
</html>