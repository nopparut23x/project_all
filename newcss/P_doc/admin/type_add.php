<?php 
$url = "type";
require_once 'header.php';
if(isset($_POST['type_name'])){
    $fields = array(
        'type_name' => $_POST['type_name'],
    );
    $insert = $db->insert('type', $fields);
    if($insert){
        alert('เพิ่มประเภทเอกสารเรียบร้อย');
        redirect('type.php');
    }
}
?>
<body>
<div class="d-center">
    <div class="box-fixed" style="width:500px;">
        <div class="form-content">
        <form method="post">
        <p>ชื่อประเภทเอกสาร</p>
        <input type="text" name="type_name" required placeholder="ชื่อประเภทเอกสาร">
        <br>
        <br>
        <button class="btn btn-w100" type="submit">เพิ่มประเภทเอกสาร</button>
    </form>
        </div>
    </div>
</div>
</body>
</html>