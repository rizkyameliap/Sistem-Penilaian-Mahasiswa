<?php
require_once "config.php";

class Course {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->db;
    }

    public function getAllCourses() {
        $stmt = $this->db->query("SELECT * FROM courses"); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    

    public function addCourse($course_id, $course_name) {
        $stmt = $this->db->prepare("INSERT INTO courses (id, course_name) VALUES (?, ?)");
        return $stmt->execute([$course_id, $course_name]);
    }

    public function deleteCourse($id) {
        $stmt = $this->db->prepare("DELETE FROM courses WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
