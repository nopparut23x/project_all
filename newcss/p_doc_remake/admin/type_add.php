<?php
$url = "type";
require_once 'header.php';
if(isset($_POST['type_name'])){
    $fields = array(
        'type_name' => $_POST['type_name'],
    );
    $insert = $db->insert('type', $fields);
    if($insert){
        alert('เพิ่มเรียบร้อย');
        redirect('type.php');
    }
}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <h2>เเก้ไขประเภทเอกสาร</h2>
    <form method="post">
        <p>ชื่อประเภทเอกสาร</p>
        <input type="text" name="type_name" required placeholder="ชื่อประเภทเอกสาร">
        <br>
        <br><button type="submit">
            ตกลง
        </button>
    </form>
            </div>
        </div>
    </div>
</body>
</html>