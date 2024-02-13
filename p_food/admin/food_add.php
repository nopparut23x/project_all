<?php
$url = "food";
require_once 'header.php';


$log = $db->select('category');
if(isset($_POST['food_name'])){
    if(!empty($_FILES['img']['name'])){
        $file = $db->upload($_FILES['img'], $path = 'assets/img');
    }
    $fields =array(
        'food_name' => $_POST['food_name'],
        'price_food' => $_POST['price_food'],
        'img' => $file,
        'ca_id' => $_POST['category'],
        'status' => '1'
    );
    $insert = $db->insert('food', $fields);
    if($insert){
        alert('เพิ่มเมนูอาหารเรียบร้อย');
        redirect('food.php');
    }
}
?>

<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <form method="post" enctype="multipart/form-data">
        <h1>เพิ่มเมนูอาหาร</h1>
        <center>
            <input type="file" name="img" required>
        </center>
        <p>ชื่อเมนูอาหาร</p>
        <input type="text" name="food_name" required>
        <p>ราคาอาหาร</p>
        <input type="text" name="price_food" required>
        <br>
        <label for="category">หมวดหมู่อาหาร</label>
        <select name="category" id="category" required>
            <?php foreach($log as $row){ ?>
            <option value="<?php echo $row['ca_id'] ?>"><?php echo $row['ca_name'] ?></option>
            <?php } ?>
        </select>
        <br><br>
        <button type="submit">
            เพิ่มเมนูอาหาร
        </button>
    </form>
            </div>
        </div>
    </div>
</body>
</html>