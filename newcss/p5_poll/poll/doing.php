<?php
$url = "poll";
require_once 'header.php';
$where = array(
    'poll_id' => $_GET['id']
);
$log = $db->selectwhere('ask', $where);
if(isset($_POST['save'])){
    foreach($_POST['ans'] as $key => $value){
        $fields = array(
            'ask_id' => $key,
            'ans_id' => $value,
            'poll_id' => $_GET['id'],
        );
        $insert = $db->insert('reserve', $fields);
    }
    if($insert){
        alert('ทำเเบบสอบถามเรียบร้อย');
        redirect('poll.php');
    }
}
?>
<body>
    <h1>แบบสำรวจ</h1>
<div class="d-fixed jcc">
    <form method="post">
    <?php foreach($log as $row){ 
        $where2 = array(
            'ask_id' => $row['ask_id']
        );
        $log2 = $db->selectwhere('ans', $where2);  ?>
    <div class="box-fixed fix-card">
            <div class="form-">
    <p><b>คำถาม :</b><?php echo $row['ask_text'] ?></p>
    <?php foreach($log2 as $key => $row2){ ?>
    <input type="radio" name="ans[<?php echo $row['ask_id'] ?>]" id="ans<?php echo $row2['ans_id'] ?>" value="<?php echo $row2['ans_id'] ?>" required>
    <label for="ans<?php echo $row2['ans_id'] ?>"><?php echo $row2['ans_text'] ?></label>
    
    <?php } ?> </div>
        </div> <br> <?php   }?>    
    <br>
    <br>
    <div class="d-flex jcc">
    <button class="btn" type="submit" name="save" onclick="return confirm('ยืนยันคำตอบ')">ส่งคำตอบ</button>
    </div>
</form>
    </div>

</body>
</html>