<?php
include '../config.php';

$stmt = $conn->prepare("SELECT Detail_Peminjaman.*, Peminjaman.id_peminjaman AS id_peminjaman_ref, Buku.judul AS judul_buku FROM Detail_Peminjaman
                        JOIN Peminjaman ON Detail_Peminjaman.id_peminjaman = Peminjaman.id_peminjaman
                        JOIN Buku ON Detail_Peminjaman.id_buku = Buku.id_buku");
$stmt->execute();
$detail_peminjaman = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Daftar Detail Peminjaman</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Daftar Detail Peminjaman</h1>
        <a href="create.php" class="btn btn-primary mb-3">Tambah Detail Peminjaman</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Peminjaman</th>
                    <th>Judul Buku</th>
                    <th>Nama Buku</th>
                    <th>Denda</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detail_peminjaman as $dp): ?>
                    <tr>
                        <td><?php echo $dp['id_detail_peminjaman']; ?></td>
                        <td><?php echo $dp['id_peminjaman_ref']; ?></td>
                        <td><?php echo $dp['judul_buku']; ?></td>
                        <td><?php echo $dp['nama_buku']; ?></td>
                        <td><?php echo $dp['denda']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $dp['id_detail_peminjaman']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $dp['id_detail_peminjaman']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus detail peminjaman ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
