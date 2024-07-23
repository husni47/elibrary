<?php
include '../config.php';

$id_anggota = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM Anggota WHERE id_anggota = ?");
$stmt->execute([$id_anggota]);
$anggota = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    $stmt = $conn->prepare("UPDATE Anggota SET nama = ?, alamat = ?, no_telepon = ? WHERE id_anggota = ?");
    $stmt->execute([$nama, $alamat, $no_telepon, $id_anggota]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Edit Anggota</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Anggota</h1>
        <form method="POST" class="mt-3">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $anggota['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $anggota['alamat']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?php echo $anggota['no_telepon']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>