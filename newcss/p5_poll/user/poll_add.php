<?php 
$url = "poll";
require_once 'header.php'; 
if(isset($_POST['poll'])){
    $where = array(
        'poll_name' => $_POST['poll'],
    );
    $log = $db->selectwhere('poll', $where);
    if(empty($log[0])){
        if(!empty($_FILES['img']['name'])){
            $file = $db->upload($_FILES['img'], $path = 'assets/img');
        }
        $fields = array(
            'poll_name' => $_POST['poll'],
            'img' => $file,
            'type_id' => $_POST['type'],
            'user_id' => $_SESSION['user_id_user']
        );
        $insert = $db->insert('poll', $fields);
        $id = $db->db->insert_id;
        if($insert){
            redirect('ansandask_add.php?id='.$id.'');
        }
    }else{
        alert('มีเเบบสำรวจนี้อยู่เเล้ว');
        redirect('poll_add.php');
    }
}
$s = $db->select('type');
?>
<body>
<div class="d-center">
    <div class="box-fixed boxset-form">
        <div class="form-content">
        <h2>เพิ่มประเภทเเบบสำรวจ</h2>
        <form method="post" enctype="multipart/form-data">
            <center>
                <label for="img">รูปเเบบสำรวจ</label>
                <input type="file" name="img" required></center>
            <p>ชื่อประเภท</p>
            <input type="text" name="poll" placeholder="ชื่อ" required>
          
            <br><br>
            <label for="select">ประเภทเเบบสำรวจ</label>
            <select name="type" >
                <?php foreach($s as $sr){ ?>
                <option value="<?php echo $sr['type_id'] ?>"><?php echo $sr['type_name'] ?></option>
                <?php } ?>
            </select>
            <br><br>
            <button class="btn btn-w100" type="submit">
                เพิ่มประเภทเเบบสำรวจ
            </button>
        </form>
            </div>
    </div>
</div>
</body>
</html>