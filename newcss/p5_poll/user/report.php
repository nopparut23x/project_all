<?php
$url = "poll";
require_once 'header.php';
$where = array(
    'poll_id' => $_GET['id']
);
$log_p = $db->selectwhere('poll', $where);
foreach($log_p as $row_p);
$log = $db->selectwhere('ask', $where);
if(isset($_POST['save'])){
    foreach($_POST['ans'] as $key => $value){
        $fields = array(
            'ask_id' => $key,
            'ans_id' => $value,
            'poll_id' => $_GET['id'],
        );
        $insert = $db->insert('reserve', $fields);
    }
    if($insert){
        alert('ทำเเบบสอบถามเรียบร้อย');
        redirect('poll.php');
    }
}

?>
<body>
    <h2>รายงานการทำเเบบสำรวจ <?php echo $row_p['poll_name'] ?></h2>
    <br>
<div class="d-fixed jcc">

    <form method="post">
    <?php foreach($log as $row){ 
        $where2 = array(
            'ask_id' => $row['ask_id']
        );
        $log2 = $db->selectwhere('ans', $where2);  ?>
    <div class="box-fixed boxcard-form " style="width:100vh;">
    <div class="form-content">
    <p><b>คำถาม :</b><?php echo $row['ask_text'] ?></p>
    <?php foreach($log2 as $key => $row2){ 
        $sql = "SELECT COUNT(ans_id) as sum FROM reserve WHERE ans_id = '{$row2['ans_id']}'
        GROUP BY reserve.poll_id ";
        $result = mysqli_query($db->db, $sql); ?>
        <p><?php echo $row2['ans_text'];  ?> ตอบทั้งหมด  <?php foreach($result as $sum){ echo $sum['sum'] . " คน " ; }  ?> </p>
    <?php  } echo "<br></div></div>"; } ?>
</form>
</div>
</body>
</html>