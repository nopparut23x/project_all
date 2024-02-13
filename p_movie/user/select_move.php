<?php
$url = 'homepage';
require_once 'header.php';
$where = array(
    'status_seat' => '0',
    'movie_id' => $_GET['id']
);
$log = $db->selectwhere('seat',$where);
if(isset($_GET['set_id'])){
    $fields = array(
        'user_id' => $_SESSION['user_id'],
        'movie_id' => $_GET['mov_id'],
        'seat_id' =>   $_GET['set_id'],
        'status_seat' => '0'

    );
    $insert = $db->insert('reserve', $fields);
    $where_up = array(
        'seat_id' => $_GET['set_id']
    );
$fields_up = array(
    'status_seat' => '1'
);
    $update = $db->update("seat",$fields_up,$where_up);
    if($insert){
        alert('เลือกที่นั่งสำเร็จ');
        redirect('history.php');
    }
}
?>
<body>
    <center>
        <h1>ผังที่นั่ง</h1>
        <img src="../assets/img/6597b5098a5ed.jpg" width="400px" height="600px">
    </center>
   <h3>ที่นั่งภาพยนตร์</h3> 
   <br>
<div class="d-fixed">
        <?php foreach($log as $row){?>
        <div class="box-fixed boxset-form">
            <div class="form-style";>
            <h2><b>เลขที่นั่ง :</b> <?php echo $row['seat_number'] ?></h2>
   <h2><b>กลุ่ม :</b><?php echo $row['seat_group'] ?></h2>
   <br>
          <hr>
          <br>
        </div>
           <a class="btn-dodgerblue " href="?set_id=<?php echo $row['seat_id'] ?>&mov_id=<?php echo $_GET['id'] ?>">เลือก</a>
           </div>
           <?php } ?>
    
</div>
</body>
</html>