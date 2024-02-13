<?php 
$url = "send_department";
require_once 'header.php';
$log = $db->select('type');
$log2 = $db->select('department');
$log = $db->select('type');
$where_user = array(
    'user_id' => $_SESSION['user_id'],
);

$log_user = $db->selectwhere('users', $where_user);
foreach($log_user as $row_user);


if(isset($_POST['text'])){
    if(!empty($_FILES['file']['name'])){
        $file = $db->upload($_FILES['file'], $path = 'assets/file');
    }
    $fields = array(
        'file' => $file,
        'user_id_se' => $_SESSION['user_id'],
        'department_id_se' =>  $row_user['de_id'],
        'department_id_re' => $_POST['department'],
        'type_id' => $_POST['type'],
        'text' => $_POST['text']
    );
    $insert = $db->insert('department_send', $fields);
    if($insert){
        alert('ส่งเอกสารเรียบร้อย');
        redirect('send_history_de.php');
    }
}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <h2>ส่งเอกสารให้เเผนก</h2>
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
            <label for="de_id">เเผนกที่ส่ง</label>
            <select name="department" id="de_id">
                    <?php foreach($log2 as $row3){  
                        ?>
                        <option value="<?php echo $row3['de_id'] ?>"><?php echo $row3['de_name']?></option>
                    <?php   } ?>
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