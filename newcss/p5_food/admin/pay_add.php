<?php
$url = "pay";
require_once 'header.php';
if(isset($_POST['name'])){
    $file = $db->upload($_FILES['img'], 'assets/img');
    $fields = array(
        'pay_name' => $_POST['name'],
        'bank' => $_POST['bank'],
        'bank_id' => $_POST['bank_id'],
        'img' => $file
    );
    
    $insert = $db->insert('pay', $fields);
    if($insert){
        alert('เพิ่มบัญชีธนาคาร');
        redirect('pay.php');
    }
}
?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
    <form method="post" enctype='multipart/form-data'>
        <h1>เพิ่มบัญชีธนาคาร</h1>
        <br>
        <br>
        <center>
            <input type="file" name="img" required>
        </center>
        <p>ชื่อบัญชี</p>
        <input type="text" name="name" required>
        <p>เลขบัญชี</p>
        <input type="text" name="bank_id" required>
        <br>
        <br>
        <label for="bank_name">ธนาคาร</label>
        <select name="bank" id="bank_name" style="text-align:center;">
            <option value="กรุงไทย">กรุงไทย</option>
            <option value="ออมสิน">ออมสิน</option>
            <option value="กสิกรไทย">กสิกรไทย</option>
            <option value="ไทยพาณิชย์">ไทยพาณิชย์</option>
        </select>
        <br>
        <br>
        <button type="submit">
            เพิ่ม
        </button>
    </form>
    </div>
        </div>
    </div>
</body>
</html>