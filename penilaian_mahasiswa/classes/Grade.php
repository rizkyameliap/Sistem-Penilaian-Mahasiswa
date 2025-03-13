<?php
require_once "config.php";

class Grade {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->db;
    }

    public function getAllGrades() {
        $stmt = $this->db->query("SELECT grades.id, 
                                         students.name AS student_name, 
                                         courses.course_name, 
                                         grades.grade 
                                  FROM grades 
                                  JOIN students ON grades.student_id = students.id 
                                  JOIN courses ON grades.course_id = courses.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function addGrade($student_id, $course_id, $grade) {
        $stmt = $this->db->prepare("INSERT INTO grades (student_id, course_id, grade) VALUES (?, ?, ?)");
        return $stmt->execute([$student_id, $course_id, $grade]);
    }

    public function deleteGrade($id) {
        $stmt = $this->db->prepare("DELETE FROM grades WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>