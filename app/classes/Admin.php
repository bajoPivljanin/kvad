<?php
class Admin{
    protected $conn;
    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }
    public function create($username,$password){
        $hashed_password = password_hash($password,PASSWORD_DEFAULT);

        $sql = "INSERT INTO admin (username,password) VALUES (?,?)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("ss",$username,$hashed_password);
        $result = $stmt->execute();

        if($result){
            $_SESSION['admin_id'] = $result->insert_id;
            return true;
        }
        else{
            return false;
        }
    }
    public function login($username,$password){
        $sql = "SELECT admin_id,password FROM admin WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s",$username);
        $stmt->execute();

        $results = $stmt->get_result();

        if($results->num_rows==1){
            $admin = $results->fetch_assoc();
            if(password_verify($password,$admin['password'])){
                $_SESSION['admin_id'] = $admin['admin_id'];
                return true;
            }
        }
    }
    public function is_logged(){
        if(isset($_SESSION['admin_id'])){
            return true;
        }
        return false;
    }
}