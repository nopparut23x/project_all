<?php
$url = "category";
require_once 'header.php';
$where =array(
    'ca_id' => $_GET['id'],
);
$log = $db->selectwhere('category', $where);
foreach($log as $row);
if(isset($_POST['ca_name'])){
    
$fields = array(
    'ca_name' => $_POST['ca_name'],
);

$update = $db->update('category', $fields, $where);
if($update){
    alert('เเก้ไขหมวดหมู่เรียบร้อย');
    redirect('category.php');
}
}
?>

<body>
<div class="d-center">
    <div class="box-fixed boxset-form">
        <div class="form-style">
    <form method="post">
        <h1>เเก้ไขหมวดหมู่อาหาร</h1>
        <p>ชื่อหมวดหมู่อาหาร</p>
        <input type="text" name="ca_name" required value="<?php echo $row['ca_name'] ?>">
        <br>
        <br>
        <button type="submit">
            เเก้ไขหมวดหมู่อาหาร
        </button>
    </form>
    </div>
    </div>
</div>
</body>
</html>