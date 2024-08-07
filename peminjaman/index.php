<?php
include '../config.php';

$stmt = $conn->prepare("SELECT Peminjaman.*, Anggota.nama AS nama_anggota, Petugas.nama_petugas AS nama_petugas FROM Peminjaman
                        JOIN Anggota ON Peminjaman.id_anggota = Anggota.id_anggota
                        JOIN Petugas ON Peminjaman.id_petugas = Petugas.id_petugas");
$stmt->execute();
$peminjaman = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Daftar Peminjaman</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Daftar Peminjaman</h1>
        <a href="create.php" class="btn btn-primary mb-3">Tambah Peminjaman</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Anggota</th>
                    <th>Nama Petugas</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($peminjaman as $p): ?>
                    <tr>
                        <td><?php echo $p['id_peminjaman']; ?></td>
                        <td><?php echo $p['nama_anggota']; ?></td>
                        <td><?php echo $p['nama_petugas']; ?></td>
                        <td><?php echo $p['tanggal_pinjam']; ?></td>
                        <td><?php echo $p['tanggal_kembali']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $p['id_peminjaman']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $p['id_peminjaman']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?')">Delete</a>
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
