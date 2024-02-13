<?php
$url = "poll";
require_once 'header.php'; 
if(!empty($_GET['id'])){
    $_SESSION['poll_id'] = $_GET['id'];
}
$wh = array(
    'poll_id' => $_SESSION['poll_id']
);
$lo = $db->selectwhere('poll', $wh);
foreach($lo as $row2);

if(isset($_POST['name'])){
    if(!empty($_FILES['img']['name'])){
        $file = $db->upload($_FILES['img'], $part = 'assets/img');
    }else{
        $file = $row2['profile'];
    }
    $fields = array(
        'profile' => $file,
        'user_id' => $_SESSION['user_id'],
        'name' => $_POST['name'],
        'type_id' => $_POST['type']
    );
    $log = $db->update('poll',$fields, $wh);
    if($log){
        alert('เเก้ไขเรียบร้อย');
        redirect('poll.php');
    }
}
$log = $db->select('type');
$where2 = array(
    'type_id' => $row2['type_id']
);
$log2 = $db->selectwhere('type', $where2);
foreach($log2 as $row3);
$log4 = $db->selectwhere('ask', $wh);
if(isset($_GET['ans'])){
    $delete = array(
        'ans_id' => $_GET['ans']
    );
    $dele = $db->delete('ans', $delete);
    if($dele){
        alert('ลบคำตอบเรียบร้อย');
        redirect("poll_edit.php?id={$_SESSION['poll_id']}");
    }
}
if(isset($_GET['ask'])){
    $delete = array(
        'ask_id' => $_GET['ask']
    );
    $dele = $db->delete('ask', $delete);
    $dele = $db->delete('ans', $delete);
    if($dele){
        alert('ลบถามเรียบร้อย');
        redirect("poll_edit.php?id={$_SESSION['poll_id']}");
    }
}

?>


<body>
    <br>
    <a class="a-btn" href="poll_ask_add.php?id=<?php echo $_SESSION['poll_id'] ?>">เพิ่มคำถามเเละคำตอบ</a>
    <div class="d-flex jcc">
    <div class="form-style" style="width:80%; ">
    <form method="post" enctype="multipart/form-data">
        <h2>เเก้ไขเเบบสำรวจ</h2>
        <center>
        <p>รูปเเบบสำรวจ</p>   
        <div class="d-flex jcc">
        <input type="file" name="img"  style="border:2px solid white; cursor:pointer; color:white;">
        </div>
        <p>ชื่อเเบบสำรวจ</p>
        <input type="text" name="name" required value="<?php echo $row2['name'] ?>">
        <br>
        <br>
        <label style="color:white;" for="">ประเภทเเบบสำรวจ</label>
        <select name="type" id="" style="padding:6px">
        <option value="<?php echo $row3['type_id'] ?>"><?php echo $row3['type_name'] ?></option>
            <?php foreach($log as $row){ if($row['type_id'] == $row['type_id']){}else{?>
                <option value="<?php echo $row['type_id'] ?>"><?php echo $row['type_name'] ?></option>
                <?php } } ?>
        </select>
        <br><br>
        <button type="submit">
            เเก้ไขเเบบสำรวจ
        </button>
    </center>
    </form>
    </div>
    </div>
    <br>
    <hr>
    <br>

    <?php foreach($log4 as $row5){ 
        $where_ans = array(
            'ask_id' => $row5['ask_id']
        );
        $log3 = $db->selectwhere('ans', $where_ans);
        ?>
        <div class="box-fixed " style="width:100%;">
        <div class="form-style">
 <p><b>คำถาม :</b><?php echo $row5['ask_text'] ?> <br> <a class="a-delete" style="margin-top:12px;" href="?ask=<?php echo $row5['ask_id'] ?>">[ลบ]</a></p>
 <?php foreach($log3 as $row4){ ?>
 <p><b>คำตอบ :</b><?php echo $row4['ans_name'] ?> <br> <a class="a-delete" style="margin-top:12px;" href="?ans=<?php echo $row4['ans_id'] ?>">[ลบ]</a></p>

    <?php  }?>
    </div>
    </div>
    <?php echo"<br>"; } ?>
    
</div>
</body>
</html>