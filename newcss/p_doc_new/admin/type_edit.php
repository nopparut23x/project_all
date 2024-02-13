<?php
$url = "type";
require_once 'header.php';
$where = array(
    'type_id' => $_GET['id']
);
$log = $db->selectwhere('type', $where);
foreach($log as $row);
if(isset($_POST['type_name'])){
    $fields = array(
        'type_name' => $_POST['type_name'],
    );
    $update = $db->update('type', $fields, $where);
    if($update){
        alert('เเก้ไขเรียบร้อย');
        redirect('type.php');
    }
}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <h2>เเก้ไขประเภทเอกสาร</h2>
            <hr>
            <form method="post">
            <p class="tac">ชื่อประเภทเอกสาร</p>
            <input type="text" name="type_name" required placeholder="ชื่อประเภทเอกสาร" value="<?php echo $row['type_name'] ?>">
            <br>
            <br>
            <button type="submit">
                ตกลง
            </button>
        </form>
            </div>
        </div>
    </div>
</body>
</html>