<?php 
$url = 'theater';
require_once 'header.php'; 
if(isset($_POST['theater'])){
    $fields = array(
        'theater_name' => $_POST['theater'] 
    );
    $log = $db->selectwhere('theater',$fields);
    if(!empty($log[0])){
        alert('มีโรงภาพยนตร์นี้เเล้ว');
        redirect('theater.php');
    }else{


    $insert = $db->insert('theater', $fields);
    if($insert){
        alert('เพิ่มเรียบร้อย');
        redirect('theater.php');
    }
}
}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-content">
            <form method="post">
        <h2>โรงฉายภาพยนตร์</h2>
        <p>ชื่อโรงฉายภาพยนตร์</p>
        <input type="text" name="theater" required placeholder="โรงฉายภาพยนตร์">
        <br><br>
        <button class="btn btn-w100" type="submit">
            เพิ่มโรงฉายภาพยนตร์
        </button>
    </form>
            </div>
        </div>
    </div>
</body>
</html>