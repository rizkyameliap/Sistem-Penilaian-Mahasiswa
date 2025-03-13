<?php
require_once "config.php";

class Student {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->db;
    }

    public function getAllStudents() {
        $stmt = $this->db->query("SELECT * FROM students");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addStudent($name, $email) {
        $stmt = $this->db->prepare("INSERT INTO students (name, email) VALUES (?, ?)");
        return $stmt->execute([$name, $email]);
    }

    public function deleteStudent($id) {
        $stmt = $this->db->prepare("DELETE FROM students WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>