<?php
require_once "../classes/Grade.php";
$grade = new Grade();
$grades = $grade->getAllGrades();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2 class="text-center mb-4">Kelola Nilai Mahasiswa</h2>

    <a href="../actions/add_grade.php" class="btn btn-success mb-3">Tambah Nilai</a>

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
            <?php foreach ($grades as $g) { ?>
                <tr>
                    <td><?= $g['id'] ?></td>
                    <td><?= $g['student_name'] ?></td>
                    <td><?= $g['course_name'] ?></td>
                    <td><?= $g['grade'] ?></td>
                    <td>
                        <a href="../actions/edit_grade.php?id=<?= $g['id'] ?>" class="btn btn-warning">Edit</a>
                        <form action="../actions/delete_grade.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $g['id'] ?>">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?');">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
