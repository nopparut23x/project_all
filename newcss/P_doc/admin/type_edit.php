<?php
$url = "type";

require_once 'header.php';
$where = array(
    'type_id' => $_GET['id'],
);
$log2 = $db->selectwhere('type', $where);
foreach($log2 as $row);

if(isset($_POST['type_name'])){
    $fields = array(
        'type_name' => $_POST['type_name'],
    );
    $update = $db->update('type', $fields, $where);
    if($update){
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
        <input type="text" name="type_name" required placeholder="ชื่อประเภทเอกสาร" value="<?php echo $row['type_name'] ?>">
        <br>
        <br>
        <button class=" btn btn-w100" type="submit">เเก้ไขประเภทเอกสาร</button>
    </form>
            </div>
        </div>
    </div>
</body>
</html>