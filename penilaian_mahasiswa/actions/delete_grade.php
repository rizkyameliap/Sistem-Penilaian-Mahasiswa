<?php
require_once "../classes/Grade.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gradeObj = new Grade();
    $gradeObj->deleteGrade($_POST["id"]);
    header("Location: ../views/grades.php");
    exit();
}
?>
