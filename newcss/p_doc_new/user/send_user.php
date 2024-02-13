<?php 
$url = "send_user";
require_once 'header.php';
$log = $db->select('type');
$where = array(
    'usg_status' => 'user'
);
$log2 = $db->selectwhere('users', $where);
$log = $db->select('type');

if(isset($_POST['user'])){
    if(!empty($_FILES['file']['name'])){
        $file = $db->upload($_FILES['file'], $path = 'assets/file');
    }
    $fields = array(
        'file' => $file,
        'user_id_se' => $_SESSION['user_id'],
        'user_id_re' => $_POST['user'],
        'type_id' => $_POST['type'],
        'text' => $_POST['text']
    );
    $insert = $db->insert('user_send', $fields);
    if($insert){
        alert('ส่งเอกสารเรียบร้อย');
        redirect('send_history.php');
    }
}
?>
<body>
<div class="d-center">
    <div class="box-fixed boxset-form">
        <div class="form-style">
        <h2>ส่งเอกสารให้บุคคล</h2>
    <form method="post" enctype="multipart/form-data">
        <center>
            <p>เเนบเอกสาร</p>
            <input type="file" name="file" required>
            <p>ข้อความ</p>
        <input type="text" name="text" required placeholder='ข้อความ'>
                 <br>
                <br>
            <label for="type_id">ประเภทเอกสาร</label>
            <select name="type" id="type_id">
                    <?php foreach($log as $row2){ ?>
                        <option value="<?php echo $row2['type_id'] ?>"><?php echo $row2['type_name'] ?></option>
                    <?php } ?>
            </select>
                <br>        
                <br>
            <label for="user_id">บุคคลที่ส่ง</label>
            <select name="user" id="user_id">
                    <?php foreach($log2 as $row3){  
                        if($row3['user_id'] == $_SESSION['user_id']){}else{?>
                        <option value="<?php echo $row3['user_id'] ?>"><?php echo $row3['fname']." ". $row3['lname']?></option>
                    <?php }  } ?>
            </select>
                <br>        
                <br>
                <button type="submit" onclick="return confirm('ส่งเอกสาร?')">
                    ส่งเอกสาร
                </button>
        </center>
    </form>
        </div>
    </div>
</div>
</body>
</html>