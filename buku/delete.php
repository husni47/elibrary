<?php
include '../config.php';

$id_buku = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM Buku WHERE id_buku = ?");
$stmt->execute([$id_buku]);

header("Location: index.php");
?>
