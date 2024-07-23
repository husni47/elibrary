<?php
include '../config.php';

$id_buku = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM Buku WHERE id_buku = ?");
$stmt->execute([$id_buku]);
$buku = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $stmt = $conn->prepare("UPDATE Buku SET judul = ?, penerbit = ?, tahun_terbit = ? WHERE id_buku = ?");
    $stmt->execute([$judul, $penerbit, $tahun_terbit, $id_buku]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Edit Buku</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Buku</h1>
        <form method="POST" class="mt-3">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $buku['judul']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $buku['penerbit']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?php echo $buku['tahun_terbit']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
