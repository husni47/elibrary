<?php
include '../config.php';

$id_penulis = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM Penulis WHERE id_penulis = ?");
$stmt->execute([$id_penulis]);
$penulis = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $asal_negara = $_POST['asal_negara'];
    $jumlah_karya = $_POST['jumlah_karya'];

    $stmt = $conn->prepare("UPDATE Penulis SET nama = ?, asal_negara = ?, jumlah_karya = ? WHERE id_penulis = ?");
    $stmt->execute([$nama, $asal_negara, $jumlah_karya, $id_penulis]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Edit Penulis</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Penulis</h1>
        <form method="POST" class="mt-3">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $penulis['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="asal_negara" class="form-label">Asal Negara</label>
                <input type="text" class="form-control" id="asal_negara" name="asal_negara" value="<?php echo $penulis['asal_negara']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_karya" class="form-label">Jumlah Karya</label>
                <input type="number" class="form-control" id="jumlah_karya" name="jumlah_karya" value="<?php echo $penulis['jumlah_karya']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
