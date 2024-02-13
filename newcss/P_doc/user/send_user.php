<?php 
$url = "send_user";
require_once 'header.php';
$where = array(
    'usg_status' => 'user'
);
$log = $db->selectwhere('users', $where);
$log2 = $db->select('type');

if(isset($_POST['save'])){
    if(!empty($_FILES['file']['name'])){
        $file = $db->upload($_FILES['file'], $path = 'assets/file');
    }
    $fields = array(
        'user_id_se' => $_SESSION['user_id'],
        'user_id_re' => $_POST['user'],
        'file' => $file,
        'text' => $_POST['text'],
        'type_id' => $_POST['type'],
    );
    $insert = $db->insert('send_user', $fields);
    if($insert){
        alert('ส่งเอกสารเรียบร้อย');
        redirect('his_user.php');
    }
}
?>
<body>
   <div class="d-center">
    <div class="box-fixed" style="width:500px;">
        <div class="form-content">
        <h2>ส่งเอกสารให้บุคลากร</h2>
    <br>

    <center>
    <form method="post" enctype="multipart/form-data">

        <label for="file_l">เอกสาร :</label>
        <input type="file" name="file" id="file_l" required>
        <p>ข้อความส่งถึง</p>
        <input type="text" name="text" required placeholder="ข้อความ">
            <br>
            <br>
        <label for="type_id">ประเภทเอกสาร :</label>
        <select name="type">
            <?php foreach($log2 as $row2){ ?>
                <option value="<?php echo $row2['type_id'] ?>"><?php echo $row2['type_name'] ?></option>
                <?php } ?>
        </select>
            <br>    
            <br>
        <label for="user_id">บุคลากร :</label>
        <select name="user">
            <?php foreach($log as $row){ if($row['user_id'] == $_SESSION['user_id']){}else{ ?>
                <option value="<?php echo $row['user_id'] ?>"><?php echo $row['fname']." ".$row['lname']; ?></option>
                <?php } } ?>
        </select>
            <br>
            <br>
        <button class="btn btn-w100" type="submit" name="save" onclick="return confirm('คุณต้องการส่งเอกสาร')">
            ส่งเอกสาร
        </button>
        
    </form>
    </center>

        </div>
    </div>
   </div>

</body>
</html>