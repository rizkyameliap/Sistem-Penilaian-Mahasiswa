<?php
require_once "../classes/Student.php";

$student = new Student();
$students = $student->getAllStudents();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2 class="text-center">Daftar Mahasiswa</h2>
    <a href="../actions/add_student.php" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $s) { ?>
                <tr>
                    <td><?= $s['id'] ?></td>
                    <td><?= $s['name'] ?></td>
                    <td><?= $s['email'] ?></td>
                    <td>
                        <a href="../actions/edit_student.php?id=<?= $s['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="../actions/delete_student.php?id=<?= $s['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
