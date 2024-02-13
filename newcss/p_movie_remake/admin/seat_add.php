<?php
$url = 'theater';
require_once 'header.php';
$movie = $db->select('movie');


if(isset($_POST['save'])){
    $fields = array(
        'seat_number' => $_POST['seat_number'],
        'seat_group' => $_POST['seat_group'],
        'status_seat' => '0',
        'movie_id' => $_POST['movie']

    );
    $save = $db->insert('seat', $fields);
    if($save){
        alert('เพิ่มที่นั่งเรียบร้อย');
        redirect("theater.php");
    }
}
?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-content">
    <form method="post" enctype="multipart/form-data">
        <center>
            <h2>ที่นั่งภาพยนตร์</h2>
        </center>
        <p>เลขที่นั่ง</p>
        <input type="number" min="0" name="seat_number" required>
        <p>กลุ่มที่นั่ง</p>
        <input type="text" name="seat_group" required>
        <br>
        <p>เลือกภาพยนตร์</p>
        <select name="movie" >
            <?php foreach($movie as $row){ ?>
                <option value="<?php echo $row['movie_id'] ?>"><?php echo $row['movie_name'] ?></option>
                <?php } ?>
        </select>
        <br>
        <br>
        <button class="btn btn-w100" type="submit" name="save">
            เพิ่มที่นั่ง
        </button>
    </form>
    </div>
    </div>
    </div>
</body>
</html>