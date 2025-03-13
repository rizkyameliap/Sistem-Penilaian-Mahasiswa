<?php
require_once "../classes/Course.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST["course_id"]; 
    $course_name = $_POST["course_name"];

    $course = new Course();
    $course->addCourse($course_id, $course_name); 
    header("Location: ../views/courses.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2 class="text-center mb-4">Tambah Mata Kuliah</h2>

    <form action="" method="POST">
        <!-- Input ID Mata Kuliah -->
        <div class="mb-3">
            <label for="course_id" class="form-label">ID Mata Kuliah</label>
            <input type="text" class="form-control" name="course_id" required>
        </div>

        <!-- Input Nama Mata Kuliah -->
        <div class="mb-3">
            <label for="course_name" class="form-label">Nama Mata Kuliah</label>
            <input type="text" class="form-control" name="course_name" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="../views/courses.php" class="btn btn-secondary">Batal</a>
    </form>

</body>
</html>
