<?php
class Post{
    protected $conn;
    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }
    public function fetch_all(){
        $sql = "SELECT * FROM post";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function create($userid,$title,$description,$curr_place,$first_image,$second_image,$third_image)
    {
        $sql = "INSERT INTO post (user_id,title,description,place_id,first_image,second_image,third_image) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ississs",$userid,$title,$description,$curr_place,$first_image,$second_image,$third_image);
        $stmt->execute();
    }
    public function count_posts(){
        $sql = "SELECT COUNT(post_id) as br_oglasa from post";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}