<?php 
$url = "type";

require_once 'header.php'; 
if(isset($_POST['type'])){
    $where = array(
        'type_name' => $_POST['type'],
    );
    $log = $db->selectwhere('type', $where);
    if(empty($log[0])){
        $fields = array(
            'type_name' => $_POST['type']
        );
        $insert = $db->insert('type', $fields);
        if($insert){
            alert('เพิ่มประเภทเรียบร้อย');
            redirect('type.php');
        }
    }else{
        alert('มีประเภทนี้อยู่เเล้ว');
        redirect('type_add.php');
    }
}
?>
<body>

<div class="d-center">
    <div class="box-fixed boxset-form">
        <div class="form-content">
        <h2>เพิ่มประเภทเเบบสำรวจ</h2>
        <form method="post">
            <p>ชื่อประเภท</p>
            <input type="text" name="type" placeholder="ชื่อ" required>
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