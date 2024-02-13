<?php
$url = "poll";
require_once 'header.php'; 
if(!empty($_GET['id'])){
    $_SESSION['poll_id'] = $_GET['id'];
}
$wha = array(
    'poll_id' => $_SESSION['poll_id']
);
$lo_poll = $db->selectwhere('poll', $wha);
foreach($lo_poll as $r_poll);
$ty = array(
    'type_id' => $r_poll['type_id']
);
$type2 = $db->selectwhere('type', $ty);
foreach($type2 as $srs);

if(isset($_POST['poll'])){
        if(!empty($_FILES['img']['name'])){
            $file = $db->upload($_FILES['img'], $path = 'assets/img');
        }else{
            $file = $r_poll['img'];
        }
        $fields = array(
            'poll_name' => $_POST['poll'],
            'img' => $file,
            'type_id' => $_POST['type'],
        );
        $insert = $db->insert('poll', $fields, $wha);
        $id = $db->db->insert_id;
        if($insert){
           alert('เเก้ไขเรียบร้อย');
           redirect('poll.php');
        }
    }
$s = $db->select('type');



$ask_where = array(
    'poll_id' => $_SESSION['poll_id']
);
$ask_log = $db->selectwhere('ask', $ask_where);

if(isset($_GET['del_ask'])){
    $delete = array(
        'ask_id' => $_GET['del_ask']
    );
    $de = $db->delete('ask', $delete);
    $de_ans =$db->delete('ans', $delete);
    if($de){
        alert('ลบเรียบร้อย');
        redirect("poll_edit.php?id={$_SESSION['poll_id']}");
    }
}
if(isset($_GET['del_ans'])){
    $delete = array(
        'ans_id' => $_GET['del_ans']
    );
    $de_ans = $db->delete('ans', $delete);
    if($de_ans){
        alert('ลบเรียบร้อย');
        redirect("poll_edit.php?id={$_SESSION['poll_id']}");
    }
}
?>
<body>
    <h2>เเก้ไขเเบบสำรวจ</h2>
        <a class="btn-short" href="ansandask_add.php?id=<?php echo $_GET['id'] ?>">เพิ่มคำถามเเละคำตอบ</a>
<div class="d-flex jcc">
    <div class="box-fixed boxset-form">
        <div class="form-content">
        <form method="post" enctype="multipart/form-data">
            <center>
                <label for="img">รูปเเบบสำรวจ</label>
                <input type="file" name="img" >
            <p>ชื่อประเภท</p>
            <input type="text" name="poll" placeholder="ชื่อ" value="<?php echo $r_poll['poll_name'] ?>" required>
          
            <br><br>
            <label for="select">ประเภทเเบบสำรวจ</label>
            <select name="type" >
            <option value="<?php echo $srs['type_id'] ?>"><?php echo $srs['type_name'] ?></option>
                <?php foreach($s as $sr){ if($srs['type_id'] == $sr['type_id']){}else{ ?>
                <option value="<?php echo $sr['type_id'] ?>"><?php echo $sr['type_name'] ?></option>
                <?php } } ?>
            </select>
            <br><br>
            <button class="btn btn-w100" type="submit">
                เเก้ไขประเภทเเบบสำรวจ
            </button>
        </form>
</center>

        </div>
    </div>
</div>
<br>
<br>
                <hr>
                <h2>
                คำถามเเละคำตอบ
                </h2>
<div class="d-fixed">

        <?php foreach($ask_log as $ask_row){
            $ans_where = array(
                'ask_id' => $ask_row['ask_id']
            );
            $log_ans = $db->selectwhere('ans', $ans_where);
            ?>
    <div class="box-fixed">
        <div class="form-content">
            <p><b>คำถาม </b><?php echo $ask_row['ask_text']." " ?>
<a class="" href="?del_ask=<?php echo $row_ask['ask_id'] ?>">ลบ</a></p>
            <?php
            foreach($log_ans as $row_ans){ ?>
            <p><b>คำตอบ </b><?php echo $row_ans['ans_text']." " ?>
<a class="" href="?del_ans=<?php echo $row_ans['ans_id'] ?>">ลบ</a> </p>
            <?php } ?></div> </div>
<?php } ?>
</div>
</body>
</html>