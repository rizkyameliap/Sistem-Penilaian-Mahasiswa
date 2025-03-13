<?php
require_once "../classes/Course.php";
$course = new Course();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $courses = $course->getAllCourses();
    $currentCourse = null;
    
    foreach ($courses as $c) {
        if ($c['id'] == $id) {
            $currentCourse = $c;
            break;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $course_name = $_POST["course_name"];
    $stmt = $course->db->prepare("UPDATE courses SET course_name = ? WHERE id = ?");
    $stmt->execute([$course_name, $id]);
    header("Location: ../views/courses.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2 class="text-center mb-4">Edit Mata Kuliah</h2>

    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $currentCourse['id'] ?>">
        <div class="mb-3">
            <label for="course_name" class="form-label">Nama Mata Kuliah</label>
            <input type="text" class="form-control" name="course_name" value="<?= $currentCourse['course_name'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="../views/courses.php" class="btn btn-secondary">Batal</a>
    </form>

</body>
</html>
