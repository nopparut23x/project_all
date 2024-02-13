<?php
$url = "poll";
require_once 'header.php'; 
$item = 0;

if(isset($_POST['save'])){
    $item = 1;
    if(isset($_POST['ask'])){
        $_SESSION['ask'] = $_POST['ask'];
        $fields = array(
            'ask_text' => $_POST['ask'],
            'poll_id' => $_GET['id'],

        );
        $insert = $db->insert('ask',$fields);
        $id_ask = $db->db->insert_id;
        $_SESSION['ask_id'] = $id_ask;

    }
    if(isset($_POST['ans'])){
        $fields = array(
            'ans_name' => $_POST['ans'],
            'ask_id' => $_SESSION['ask_id'],
            'poll_id' => $_GET['id'],
        );
    }
    $insert_ans = $db->insert('ans', $fields);
    if($insert_ans){
        alert('เพิ่มเรียบร้อย');
    }
 
}
if(isset($_GET['ask_id'])){
    redirect("poll_ask_add.php?id={$_GET['ask_id']}");
}
?>
<body>
<center>
<?php if($item == 1){ ?>
    <br>
   <a class="a-btn" href="?ask_id=<?php echo $_GET['id'] ?>">เพิ่มคำถามใหม่</a>
        <?php } ?>
    <div class="d-center">
        <div class="box-fixed">
            <div class="form-style">
            <form method="post" enctype="multipart/form-data">
        <h2>เพิ่มคำถามเเละคำตอบ</h2>
        <p>คำถาม</p>
        <input type="text" name="ask" <?php echo $item == 1?"disabled  ":""; ?> placeholder="คำถาม" required value="<?php echo $item ==1?"{$_SESSION['ask']}":""; ?>">
        <p>คำตอบ</p>
        <input type="text" name="ans" placeholder="คำตอบ" <?php echo $item == 1?"":"required"; ?> >
        <br>
        <br>
        <button type="submit" name="save">
            เพิ่ม
        </button>
        <br>
        <a href="poll.php">กลับ</a>
    </center>

    </form>
            </div>
        </div>
    </div>
</body>
</html>