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
    
            
            <form method="post">
                <?php foreach($log as $row){ 
                    $where2 = array(
                        'ask_id' => $row['ask_id']
                    );
                    $log2 = $db->selectwhere('ans', $where2);  ?>
                <div class="box-fixed" style="margin-top:20px; width:100%;">
                    <div class="form-style">
                <p><b>คำถาม : </b><?php echo $row['ask_text'] ?></p>
                <br>
                <?php foreach($log2 as $key => $row2){ ?>
                <div class="radio-center">
                <input type="radio" name="ans[<?php echo $row['ask_id'] ?>]" id="ans<?php echo $row2['ans_id'] ?>" value="<?php echo $row2['ans_id'] ?>" required>
                <label style='color:white;' for="ans<?php echo $row2['ans_id'] ?>"><?php echo $row2['ans_name'] ?><?php?></label>
                <br>
                </div>
                <?php } ?>
                <br>
                
                <br>
                </div>
                </div>
                <?php  }?>  
                <br>
                <br>
                
    
    <br>
    <div class="d-flex jcc btn-w100">
    <button class="btn" type="submit" name="save" onclick="return confirm('ยืนยันคำตอบ')">ส่งคำตอบ</button>
    </div>
    </form>

</body>
</html>