<?php
$url = "category";
require_once 'header.php';
if(isset($_POST['ca_name'])){
    $fields = array(
        'ca_name' => $_POST['ca_name'],
    );
    $insert = $db->insert('category', $fields);
    if($insert){
        alert('เพิ่มหมวดหมู่อาหารเรียบร้อย');
        redirect('category.php');
    }
}
?>

<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <form method="post">
                <h1>เพิ่มหมวดหมู่อาหาร</h1>
                <p>ชื่อหมวดหมู่อาหาร</p>
                <input type="text" name="ca_name" required >
                <br>
                <br>
                <button type="submit">
                    เพิ่มหมวดหมู่อาหาร
                </button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>