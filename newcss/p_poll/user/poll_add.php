<?php 
$url = "poll";
require_once 'header.php'; 
if(isset($_POST['name'])){
    if(!empty($_FILES['img']['name'])){
        $file = $db->upload($_FILES['img'], $part = 'assets/img');
    }
    $fields = array(
        'profile' => $file,
        'user_id' => $_SESSION['user_id'],
        'name' => $_POST['name'],
        'type_id' => $_POST['type']
    );
    $log = $db->insert('poll',$fields);
    $insert_id = $db->db->insert_id;
    if($log){
       redirect("poll_ask_add.php?id={$insert_id}");
    }
}
$log = $db->select('type');
?>
<body>
   <div class="d-center">
    <div class="box-fixed boxset-form">
        <div class="form-style">
        <form method="post" enctype="multipart/form-data">
        <h2>เพิ่มเเบบสำรวจ</h2>
        <center>
        <p>รูปเเบบสำรวจ</p>
        <input type="file" name="img" required style="border:1px solid white; color:white;">
        <p>ชื่อเเบบสำรวจ</p>
        <input type="text" name="name" required>
        <br>
        <br>
        <label for="">ประเภทเเบบสำรวจ</label>
        <select name="type" id="">
            <?php foreach($log as $row){ ?>
                <option value="<?php echo $row['type_id'] ?>"><?php echo $row['type_name'] ?></option>
                <?php } ?>
        </select>
        <br><br>
        <button type="submit">
            เพิ่มเเบบสำรวจ
        </button>
    </center>

    </form>
        </div>
    </div>
   </div>
</body>
</html>