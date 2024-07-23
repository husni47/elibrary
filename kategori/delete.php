<?php
include '../config.php';

$id_kategori = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM Kategori WHERE id_kategori = ?");
$stmt->execute([$id_kategori]);

header("Location: index.php");
?>
