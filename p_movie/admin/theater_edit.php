<?php
$url = 'theater';
require_once 'header.php'; 
$where = array(
    'theater_id' => $_GET['id']
);
$log = $db->selectwhere('theater', $where);
foreach($log as $row);
if(isset($_POST['theater'])){
    $fields = array(
        'theater_name' => $_POST['theater'] 
    );
    $insert = $db->update('theater', $fields, $where);
    if($insert){
        alert('เเก้ไขเรียบร้อย');
        redirect('theater.php');
}
}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <form method="post">
        <h2>โรงฉายภาพยนตร์</h2>
        <p>ชื่อโรงฉายภาพยนตร์</p>
        <input type="text" name="theater" required placeholder="โรงฉายภาพยนตร์" value="<?php echo $row['theater_name'] ?>">
        <br><br>
        <button type="submit">
           เเก้ไขโรงฉายภาพยนตร์
        </button>
    </form>
            </div>
        </div>
    </div>
</body>
</html>