<?php
require_once "../classes/Grade.php";

$gradeObj = new Grade();
$grade = $gradeObj->getGradeById($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gradeObj->updateGrade($_POST["id"], $_POST["student_id"], $_POST["course_id"], $_POST["grade"]);
    header("Location: ../views/grades.php");
    exit();
}
?>

