<?php
$url = "department";
require_once 'header.php';
$where = array(
    'de_id' => $_GET['id']
);
$log = $db->selectwhere('department', $where);
foreach($log as $row);
if(isset($_POST['de_name'])){
    $fields = array(
        'de_name' => $_POST['de_name'],
    );
    $update = $db->update('department', $fields, $where);
    if($update){
        alert('เเก้ไขเรียบร้อย');
        redirect('department.php');
    }
}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <h2>เเก้ไขเเผนกวิชา</h2>
    <form method="post">
        <p>ชื่อเเผนกวิชา/งานอื่นๆ</p>
        <input type="text" name="de_name" required placeholder="ชื่อเเผนกวิชา/งานอื่นๆ" value="<?php echo $row['de_name'] ?>">
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