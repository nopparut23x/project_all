<?php
$url = "movie";
require_once 'header.php'; 
$log = $db->select('movie');
if(isset($_GET['del'])){
    $where = array(
        'movie_id' => $_GET['del']
    );
    $log = $db->delete('movie', $where);
    $log1 = $db->delete('reserve', $where);
    $log2 = $db->delete('seat', $where);
    if($log){
        alert('ลบเรียบร้อย');
        redirect('movie.php');
    }

}
?>
<body>

</body>
</html>