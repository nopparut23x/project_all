<?php
$url = "department";
require_once 'header.php';
if(isset($_POST['de_name'])){
    $fields = array(
        'de_name' => $_POST['de_name'],
    );
    $insert = $db->insert('department', $fields);
    if($insert){
        alert('เพิ่มเรียบร้อย');
        redirect('department.php');
    }
}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <form method="post">
        <p>ชื่อเเผนกวิชา/งานอื่นๆ</p>
        <input type="text" name="de_name" required placeholder="ชื่อเเผนกวิชา/งานอื่นๆ">
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