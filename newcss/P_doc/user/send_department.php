<?php 
$url = "send_department";
require_once 'header.php';
$log = $db->select('department');
$log2 = $db->select('type');
$user = array(
    'user_id' => $_SESSION['user_id'],
);
$user_log = $db->selectwhere('users', $user);
foreach($user_log as $row_user);
if(isset($_POST['save'])){
    if(!empty($_FILES['file']['name'])){
        $file = $db->upload($_FILES['file'], $path = 'assets/file');
    }
    $fields = array(
        'user_id_se' => $_SESSION['user_id'],
        'de_id_se' => $row_user['de_id'],
        'de_id_re' => $_POST['department'],
        'file' => $file,
        'text' => $_POST['text'],
        'type_id' => $_POST['type'],
    );
    $insert = $db->insert('send_department', $fields);
    if($insert){
        alert('ส่งเอกสารเรียบร้อย');
        redirect('his_department.php');
    }
}
?>
<body>
<div class="d-center">
    <div class="box-fixed" style="width:500px">
    <div class="form-content">
    <h2>ส่งเอกสารให้เเผนก</h2>
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
        <label for="department_id">เเผนก :</label>
        <select name="department">
            <?php foreach($log as $row){  ?>
                <option value="<?php echo $row['de_id'] ?>"><?php echo $row['de_name'] ?></option>
                <?php } ?>
        </select>
            <br>
            <br>
        <button class="btn btn-w100" type="submit" name="save" onclick="return confirm('คุณต้องการส่งเอกสาร')">
            ส่งเอกสาร
        </button>
        
    </form>
    </center>
</body>
</html>