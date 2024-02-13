<?php 
$url = "food";

require_once 'header.php';
$where_food = array(
    'food_id' => $_GET['id']
);
$log2 = $db->selectwhere('food', $where_food);
foreach($log2 as $row_food);
$log = $db->select('category');
$where = array(
    'ca_id' => $row_food['ca_id']
);
$log4 = $db->selectwhere('category', $where);
foreach($log4 as $row_ca);

if(isset($_POST['food_name'])){
    if(!empty($_FILES['img']['name'])){
        $file = $db->upload($_FILES['img'], $path = 'assets/img');
    }else{
        $file = $row_food['img'];
    }
    $fields =array(
        'food_name' => $_POST['food_name'],
        'price_food' => $_POST['price_food'],
        'img' => $file,
        'ca_id' => $_POST['category'],
    );
    $update = $db->update('food', $fields, $where_food);
    if($update){
        alert('เเก้ไขเมนูเรียบร้อย');
        redirect('food.php');
    }
}
?>

<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
            <form method="post" enctype="multipart/form-data">
                <h1>เเก้ไขเมนูอาหาร</h1>
                <center>
                    <input type="file" name="img" >
                </center>
                <p>ชื่อเมนูอาหาร</p>
                <input type="text" name="food_name" required value="<?php echo $row_food['food_name'] ?>">
                <p>ราคาอาหาร</p>
                <input type="text" name="price_food" required value="<?php echo $row_food['price_food'] ?>">
                <br>
                <label for="category">หมวดหมู่อาหาร</label>
                <select name="category" id="category" required>
                <option selected value="<?php echo $row_ca['ca_id'] ?>"><?php echo $row_ca['ca_name'] ?></option>
                    <?php foreach($log as $row){ if($row['ca_id'] == $row_food['ca_id']){}else{?>
                    <option value="<?php echo $row['ca_id'] ?>"><?php echo $row['ca_name'] ?></option>
                    <?php }} ?>
                </select>
                <br><br>
                <button type="submit">
                    เเก้ไขเมนูอาหาร
                </button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>