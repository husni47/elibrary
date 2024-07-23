<?php
include '../config.php';

$id_peminjaman = $_GET['id'];
$stmt = $conn->prepare("SELECT Peminjaman.*, Anggota.nama AS nama_anggota, Petugas.nama_petugas AS nama_petugas FROM Peminjaman
                        JOIN Anggota ON Peminjaman.id_anggota = Anggota.id_anggota
                        JOIN Petugas ON Peminjaman.id_petugas = Petugas.id_petugas
                        WHERE id_peminjaman = ?");
$stmt->execute([$id_peminjaman]);
$peminjaman = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Detail Peminjaman</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Detail Peminjaman</h1>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td><?php echo $peminjaman['id_peminjaman']; ?></td>
            </tr>
            <tr>
                <th>Nama Anggota</th>
                <td><?php echo $peminjaman['nama_anggota']; ?></td>
            </tr>
            <tr>
                <th>Nama Petugas</th>
                <td><?php echo $peminjaman['nama_petugas']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Pinjam</th>
                <td><?php echo $peminjaman['tanggal_pinjam']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Kembali</th>
                <td><?php echo $peminjaman['tanggal_kembali']; ?></td>
            </tr>
        </table>
        <a href="index.php" class="btn btn-primary">Kembali</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
