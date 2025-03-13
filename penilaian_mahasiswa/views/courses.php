<?php
require_once "../classes/Course.php";

$course = new Course();
$courses = $course->getAllCourses(); // Ambil semua data mata kuliah
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2 class="text-center mb-4">Daftar Mata Kuliah</h2>

    <!-- Tombol Tambah -->
    <a href="../actions/course.php" class="btn btn-success mb-3">Tambah Mata Kuliah</a>

    <!-- Tabel Mata Kuliah -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Mata Kuliah</th>
                <th>Aksi</th> <!-- Tambah kolom aksi -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= htmlspecialchars($course['id']) ?></td>
                    <td><?= htmlspecialchars($course['course_name']) ?></td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="edit_course.php?id=<?= $course['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        
                        <!-- Tombol Hapus -->
                        <form action="delete_course.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $course['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?');">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
