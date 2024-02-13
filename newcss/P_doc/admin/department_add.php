<?php
$url = "department";
require_once 'header.php';
if(isset($_POST['department'])){
    $fields = array(
        'de_name' => $_POST['department']
    );
    $log = $db->selectwhere('department', $fields);
    if(!empty($log[0])){
        alert('มีเเผนกวิชานี้เเล้ว');
        redirect('department_add.php');
    }else{
        $insert = $db->insert('department', $fields);
        if($insert){
            alert('เพิ่มเเผนกวิชาเรียบร้อย');
            redirect('department.php');
        }
    }

}

?>
<body>
<div class="d-center">
    <div class="box-fixed" style="width:500px;">
        <div class="form-content">
        <h2>เพิ่มเเผนกวิชา</h2>
    <form method="post">
        <p>เเผนกวิชา</p>
        <input type="text" name="department" required placeholder="เเผนกวิชา">
        <br>
    <br>
        <button class="btn btn-w100" type="submit">
            เพิ่มเเผนกวิชา
        </button>
    </form>
        </div>
    </div>
</div>
</body>
</html>