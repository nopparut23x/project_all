<?php
$url = "type";

require_once 'header.php'; 
$w = array(
    'type_id' => $_GET['id']
);
$log = $db->selectwhere("type",$w);
foreach($log as $row);
if(isset($_POST['type'])){
        $fields = array(
            'type_name' => $_POST['type']
        );
        $insert = $db->update('type', $fields, $w);
        if($insert){
            alert('เเก้ไขประเภทเรียบร้อย');
            redirect('type.php');
        }
}
?>
<body>
<div class="d-center">
    <div class="box-fixed boxset-form">
        <div class="form-content">
        <h2>เเก้ไขประเภทเเบบสำรวจ</h2>
        <form method="post">
            <p>ชื่อประเภท</p>
            <input type="text" name="type" placeholder="ชื่อ" required value="<?php echo $row['type_name'] ?>">
            <br><br>
            <button class="btn btn-w100" type="submit">
                เเก้ไขประเภทเเบบสำรวจ
            </button>
        </form>
        </div>
    </div>
</div>
</body>
</html>