<?php
$url = "m_user";
 require_once 'header.php';
 $where = array(
    'usg_status' => 'user',
 );
 $log = $db->selectwhere('users', $where);
 if(isset($_GET['on'])){
    $fields = array(
        'status' => '1'
    );
    $where2 = array(
        'user_id' => $_GET['on']
    );
    $update = $db->update('users',$fields, $where2);
    if($update){
        alert('ยกเลิกเรียบร้อย');
        redirect('m_user.php');
    }
 }
 if(isset($_GET['off'])){
    $fields = array(
        'status' => '0'
    );
    $where2 = array(
        'user_id' => $_GET['off']
    );
    $update = $db->update('users', $fields, $where2);
    if($update){
        alert('ระงับเรียบร้อย');
        redirect('m_user.php');
    }
 }
 if(isset($_GET['reset'])){
    $fields = array(
        'vote_status' => 1
    );
    $where2 = array(
        'usg_status' => 'user'
    );
    $where3 = array(
        'score' => 1
    );
    $update = $db->update('users', $fields, $where2);
    $delete = $db->delete("score", $where3);
    if($update){
        alert('รีเซ็ตเรียบร้อย');
        redirect('m_user.php');
    }
 }
 ?>
<body>
    <h2>ผู้ลงทะเบียนเลืยกตั้ง</h2>
    <a class="a2-btn" onclick="return confirm('คุณต้องการรีเซ็ตการโหวต?')" href="?reset">รีเซ็ตสิทธิการโหวต</a>
    <br><br>
    <div class="d-fixed">

    <?php foreach($log as $row){ ?>
        <div class="box-fixed" style="width:340px">
        <div class="form-content">
        <div class="img-center" >
            <img src="<?php echo $row['profile'] ?>" >
        </div>
        <br>
        
    <p><b>ชื่อ :</b><?php echo $row['fname']; ?></p>
    <p><b>นามสกุล :</b><?php echo $row['lname']; ?></p>
    <p><b>อีเมล :</b><?php echo $row['email']; ?></p>
    <p><b>ที่อยู่ :</b><?php echo $row['address']; ?></p>
    <p><b>เบอร์โทรศัพท์ :</b><?php echo $row['tell']; ?></p>
    <p><b>สิทธิการโหวต :</b><?php echo $row['vote_status'] == '1'?"ยังไม่ได้โหวต":"โหวตเเล้ว"; ?></p>
    <br>
        <?php echo $row['status'] == '1'?"<a class='a-btn ' href='?off={$row['user_id']}'>ระงับการใช้งาน</a>":"<a class='a-btn' href='?on={$row['user_id']}'>ยกเลิกการระงับใช้งาน</a>"; ?>
        </div>
    </div>
    <?php } ?>
        </div>
</body>
</html>