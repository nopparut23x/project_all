<?php
$url = "department";

require_once 'header.php';
$where= array(
    'de_id' => $_GET['id']
);
$log2 = $db->selectwhere('department', $where);
foreach($log2 as $row);

if(isset($_POST['department'])){
    $fields = array(
        'de_name' => $_POST['department']
    );
        $update = $db->update('department', $fields, $where);
        if($update){
            alert('เเก้ไขเเผนกวิชาเรียบร้อย');
            redirect('department.php');
        }
}


?>
<body>
<div class="d-center">
    <div class="box-fixed" style="width:500px;">
        <div class="form-content">
        <h2>เเก้ไขเเผนกวิชา</h2>
    <form method="post">
        <p>เเผนกวิชา</p>
        <input type="text" name="department" required placeholder="เเผนกวิชา" value="<?php echo $row['de_name'] ?>">
        <br>
    <br>
        <button class="btn btn-w100" type="submit">
            เเก้ไขเเผนกวิชา
        </button>
    </form>
        </div>
    </div>
</div>
</body>
</html>