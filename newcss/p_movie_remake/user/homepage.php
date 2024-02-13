<?php 
$url = 'homepage';
require_once 'header.php';
$log = $db->select('movie');
if(isset($_POST['search'])){
    $search = $_POST['search'];
}else{
    $search = '';
}
$date = date('Y-m-d H:i:s');
$sql = "SELECT * FROM movie WHERE movie.movie_name LIKE '%$search%' AND movie_time_end > '$date' ";
$result = mysqli_query($db->db, $sql);

if(isset($_GET['delete'])){
    $where = array(
        'movie_id' => $_GET['delete']
    );
    $delete = $db->delete('movie' , $where);
    if($delete){
        alert('ลบเรียบร้อย');
        redirect('movie.php');
    }
}
?>
<body>
   <h2>ภาพยนตร์​</h2>
   <form method="post" style="float:right;">
    <input type="text" name="search" required style=" padding:10px 10px;" placeholder="ค้นหา">
    <button class="btn" style="">
        ค้นหา
    </button>
   </form>
   <br>
   <br> 
   <br>
   <div class="d-fixed" style="gap:10px; justify-content:center;">
   <?php foreach($result as $row){
    $type  = array(
        'theater_id' => $row['theater_id']
    );
    $l = $db->selectwhere('theater', $type);
    foreach($l as $t);
   ?>

   <br>
   <div class="box-fixed boxset-form">
    <div class="form-content">

     <div style="display:flex; justify-content:center;">
     <img src="<?php echo $row['poster'] ?>" width="250px" height="250px">
     </div>
        <br>
   <p><b>ชื่อ : </b><?php echo $row['movie_name'] ?></p>
   <p><b>โรง : </b><?php echo $t['theater_name'] ?></p>
   <p><b>เวลาฉาย : </b><?php echo $row['movie_time_start'] ?></p>
   <p><b>ถึง : </b><?php echo $row['movie_time_end'] ?></p>
   <br>
          <hr>
          <br>
 
   <a class="btn btn-w100" href="select_move.php?id=<?php echo $row['movie_id'] ?>">เลือก</a>
   </div>
  </div>
        <?php
 
    } ?>
   </div>
</body>
</html>