<?php
$url = "poll";
require_once 'header.php'; 
    $check = 0;
if(isset($_POST['save'])){
    $check = 1;
   if(isset($_POST['ask'])){
    $where = array(
        'ask_text' => $_POST['ask'],
        'poll_id' => $_GET['id']
    );
    $log = $db->selectwhere('ask',$where);
    if(!empty($log[0])){
        alert('คำถามนี้มีเเล้ว');
    }else{
        $fields = array(
            'ask_text' => $_POST['ask'],
            'poll_id' => $_GET['id'],
        );
        $insert_ask = $db->insert('ask', $fields);
        $id_ask = $db->db->insert_id;
        $_SESSION['ask_id'] = $id_ask;
    }
    $_SESSION['ask_name'] = $_POST['ask'];
   }

    if(isset($_POST['ans'])){
        $where2 = array(
            'ans_text' => $_POST['ans'],
            'ask_id' => $_SESSION['ask_id']
        );
        $log2 = $db->selectwhere('ans', $where2);
        if(!empty($log2[0])){
            alert('มีคำตอบนี้เเล้ว');
        }else{
            $fields_and = array(
                'ask_id' => $_SESSION['ask_id'],
                'ans_text' => $_POST['ans'],
                'poll_id' => $_GET['id']
            );
            $isnert_ans = $db->insert('ans', $fields_and);
            if($isnert_ans){
                alert('เพิ่มเรียบร้อย');
            }
        }
    }
}
?>
<body>
<div class="d-center">
    <div class="box-fixed boxset-form">
        <div class="form-content">
        <h2>เพิ่มคำถามเเละคำตอบ</h2>
        <a href="?id=<?php echo $_GET['id'] ?>">เพิ่มคำถาม</a>
        <form method="post">
            <p>คำถาม</p>
            <input type="text" name="ask<?php echo $check == 1?"disabled":""; ?>" placeholder="คำถาม" <?php echo $check == 1?"disabled ":""; ?>  value ="<?php echo $check == 1?"{$_SESSION['ask_name']}":""; ?>" required >
            <p>คำตอบ</p>
            <input type="text" name="ans" placeholder="คำตอบ" required>
            <br><br>
            <button class="btn btn-w100" type="submit" name="save">
                เพิ่ม
            </button>
            <br>
            <a href="poll.php">สิ้นสุด</a>
        </form>
        </div>
    </div>
</div>
</body>
</html>