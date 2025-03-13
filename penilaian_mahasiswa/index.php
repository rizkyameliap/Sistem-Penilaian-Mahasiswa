<?php
require_once "classes/config.php";
require_once "classes/Grade.php";

$gradeObj = new Grade();
$grades = $gradeObj->getAllGrades();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penilaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

    <h2 class="text-center mb-4">Dashboard Penilaian</h2>

    <!-- TOMBOL TAMBAH DATA -->
    <div class="d-flex justify-content-between mb-3">
        <a href="views/students.php" class="btn btn-primary">Tambah Mahasiswa</a>
        <a href="views/courses.php" class="btn btn-secondary">Tambah Mata Kuliah</a>
        <a href="views/grades.php" class="btn btn-success">Tambah Nilai</a>
    </div>

    <!-- NAVIGASI -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#">Daftar Nilai</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="views/students.php">Kelola Mahasiswa</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="views/courses.php">Kelola Mata Kuliah</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="views/grades.php">Kelola Nilai</a>
        </li>
    </ul>

    <br>

    <!-- TABEL NILAI -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mahasiswa</th>
                <th>Mata Kuliah</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($grades)) { ?>
                <?php foreach ($grades as $g) { ?>
                    <tr>
                        <td><?= htmlspecialchars($g['id']) ?></td>
                        <td><?= htmlspecialchars($g['student_name']) ?></td>
                        <td><?= htmlspecialchars($g['course_name']) ?></td>
                        <td><?= htmlspecialchars($g['grade']) ?></td>
                        <td>
                            <a href="actions/edit_grade.php?id=<?= $g['id'] ?>" class="btn btn-warning">Edit</a>
                            <form action="actions/delete_grade.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $g['id'] ?>">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data nilai.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
