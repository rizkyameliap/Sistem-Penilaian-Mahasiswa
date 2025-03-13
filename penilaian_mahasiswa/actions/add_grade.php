<?php
require_once "../classes/Grade.php";
require_once "../classes/Student.php";
require_once "../classes/Course.php";

$studentObj = new Student();
$courseObj = new Course();
$students = $studentObj->getAllStudents();
$courses = $courseObj->getAllCourses();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];
    $course_id = $_POST["course_id"];
    $grade = $_POST["grade"];
    
    $gradeObj = new Grade();
    $gradeObj->addGrade($student_id, $course_id, $grade);
    
    header("Location: ../views/grades.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2 class="text-center mb-4">Tambah Nilai Mahasiswa</h2>

    <form action="" method="POST">
        <!-- Pilih Mahasiswa -->
        <div class="mb-3">
            <label for="student_id" class="form-label">Nama Mahasiswa</label>
            <select class="form-control" name="student_id" required>
                <option value="">Pilih Mahasiswa</option>
                <?php foreach ($students as $student) { ?>
                    <option value="<?= $student['id'] ?>"><?= $student['name'] ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- Pilih Mata Kuliah -->
        <div class="mb-3">
            <label for="course_id" class="form-label">Mata Kuliah</label>
            <select class="form-control" name="course_id" required>
                <option value="">Pilih Mata Kuliah</option>
                <?php foreach ($courses as $course) { ?>
                    <option value="<?= $course['id'] ?>"><?= $course['course_name'] ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- Input Nilai -->
        <div class="mb-3">
            <label for="grade" class="form-label">Nilai</label>
            <input type="text" class="form-control" name="grade" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="../views/grades.php" class="btn btn-secondary">Batal</a>
    </form>

</body>
</html>
