<?php
include '../config.php';

$id_detail_peminjaman = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM Detail_Peminjaman WHERE id_detail_peminjaman = ?");
$stmt->execute([$id_detail_peminjaman]);

header("Location: index.php");
?>
