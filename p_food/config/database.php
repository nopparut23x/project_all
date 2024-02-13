<?php
class Database{
    public $host = "localhost";
    public $username = "ball";
    public $password = "123456";
    public $dbname = "p3_food";
    public $db;


    public function __construct(){
        $this->dbconnnect();
    }

    public function dbconnnect(){
        $this->db = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if(!$this->db){
            print($this->db->num_error());
            exit();
        }
    $this->db->set_charset("utf8mb4");
    date_default_timezone_set("Asia/Bangkok");
    }

    public function insert($table, $fields){
        $sql = "INSERT INTO " . $table . " ( " . implode(",", array_keys($fields)) . ")VALUE('" . implode("','", array_values($fields)) . "') ";
        $result = $this->db->query($sql);
        if($result){
            return true;
        }
        return false;
    }

    public function select($table){
        $sql = "SELECT * FROM " . $table . " ";
        $result = $this->db->query($sql);
        $list = array();
        while($data = $result->fetch_assoc()){
            $list[] = $data;
        }
        return $list;
    }

    public function selectwhere($table, $where){
        $condition = "";
        foreach($where as $key => $value){
            $condition .= $key . " = '" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql = "SELECT * FROM " . $table . " WHERE " . $condition . " ";
        $result = $this->db->query($sql);
        $list = array();
        while($data = $result->fetch_assoc()){
            $list[] = $data;
        }
        return $list;
    }

    public function update($table, $fields, $where){
        $query = "";
        $condition = "";
        foreach($fields as $key => $value){
            $query .= $key . " = '" . $value . "' , ";
        }
        $query = substr($query, 0, -2);
        foreach($where as $key => $value){
            $condition .= $key . " = '" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql = "UPDATE " . $table . " SET " . $query . " WHERE " . $condition . " ";
        $reslut = $this->db->query($sql);
        if($reslut){
            return true;
        }
        return false;
    }

    public function delete($table , $where){
        $condition = "";
        foreach($where as $key => $value){
            $condition .= $key . " = '" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql = " DELETE FROM " . $table . " WHERE " . $condition . " ";
        $reslut = $this->db->query($sql);
        if($reslut){
            return true;
        }
        return false;
    }

    public function upload($file, $path){
        if(empty($file['name'])){
            return false;
        }

        $file_name = $file['name'];
        $tmp_name = $file['tmp_name'];

        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $name = uniqid();
        $rename = $name.".".$ext;
        $file_upload = $path."/".$rename;
        $upload = move_uploaded_file($tmp_name, __DIR__ . "/../" . $file_upload);
        if($upload){
            return "../". $file_upload;
        }
        return false;
    }
    
}
?>