<?php
require_once "../classes/Student.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $student = new Student();
    if ($student->deleteStudent($id)) {
        header("Location: ../views/students.php");
    } else {
        echo "Gagal menghapus mahasiswa.";
    }
}
?>
