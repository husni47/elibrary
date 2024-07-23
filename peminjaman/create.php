<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_anggota = $_POST['id_anggota'];
    $id_petugas = $_POST['id_petugas'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    $stmt = $conn->prepare("INSERT INTO Peminjaman (id_anggota, id_petugas, tanggal_pinjam, tanggal_kembali) VALUES (?, ?, ?, ?)");
    $stmt->execute([$id_anggota, $id_petugas, $tanggal_pinjam, $tanggal_kembali]);

    header("Location: index.php");
}

$stmtAnggota = $conn->prepare("SELECT * FROM Anggota");
$stmtAnggota->execute();
$anggota = $stmtAnggota->fetchAll();

$stmtPetugas = $conn->prepare("SELECT * FROM Petugas");
$stmtPetugas->execute();
$petugas = $stmtPetugas->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Tambah Peminjaman</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Tambah Peminjaman</h1>
        <form method="POST" class="mt-3">
            <div class="mb-3">
                <label for="id_anggota" class="form-label">Anggota</label>
                <select class="form-control" id="id_anggota" name="id_anggota" required>
                    <?php foreach ($anggota as $a): ?>
                        <option value="<?php echo $a['id_anggota']; ?>"><?php echo $a['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_petugas" class="form-label">Petugas</label>
                <select class="form-control" id="id_petugas" name="id_petugas" required>
                    <?php foreach ($petugas as $p): ?>
                        <option value="<?php echo $p['id_petugas']; ?>"><?php echo $p['nama_petugas']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
