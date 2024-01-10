<?php
class Place{
    protected $conn;
    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }
    public function fetch_all(){
        $sql = "SELECT * FROM place";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function create($name,$district)
    {
        $sql = "INSERT INTO place (name,district) VALUES (?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss",$name,$district);
        $stmt->execute();
    }
    public function select_two_best(){
        $sql = "SELECT * from place LIMIT 2";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function select_other(){
        $sql = "SELECT * from place LIMIT 3 OFFSET 2";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}