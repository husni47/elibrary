<?php
include '../config.php';

$id_peminjaman = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM Peminjaman WHERE id_peminjaman = ?");
$stmt->execute([$id_peminjaman]);

header("Location: index.php");
?>
