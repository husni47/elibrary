<?php
include '../config.php';

$stmt = $conn->prepare("SELECT * FROM Buku");
$stmt->execute();
$buku = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Daftar Buku</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Daftar Buku</h1>
        <a href="create.php" class="btn btn-primary mb-3">Tambah Buku</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buku as $b): ?>
                    <tr>
                        <td><?php echo $b['id_buku']; ?></td>
                        <td><?php echo $b['judul']; ?></td>
                        <td><?php echo $b['penerbit']; ?></td>
                        <td><?php echo $b['tahun_terbit']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $b['id_buku']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $b['id_buku']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
