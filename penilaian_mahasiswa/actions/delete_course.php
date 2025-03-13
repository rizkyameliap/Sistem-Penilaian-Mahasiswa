<?php
require_once "../classes/Course.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $course = new Course();
    $course->deleteCourse($id);
    header("Location: ../views/courses.php");
    exit();
}
?>
