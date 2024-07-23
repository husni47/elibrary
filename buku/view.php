<?php
include '../config.php';

$id_buku = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM Buku WHERE id_buku = ?");
$stmt->execute([$id_buku]);
$buku = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Detail Buku</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Detail Buku</h1>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td><?php echo $buku['id_buku']; ?></td>
            </tr>
            <tr>
                <th>Judul</th>
                <td><?php echo $buku['judul']; ?></td>
            </tr>
            <tr>
                <th>Penerbit</th>
                <td><?php echo $buku['penerbit']; ?></td>
            </tr>
            <tr>
                <th>Tahun Terbit</th>
                <td><?php echo $buku['tahun_terbit']; ?></td>
            </tr>
        </table>
        <a href="index.php" class="btn btn-primary">Kembali</a>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
