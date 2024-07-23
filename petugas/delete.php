<?php
include '../config.php';

$id_petugas = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM Petugas WHERE id_petugas = ?");
$stmt->execute([$id_petugas]);

header("Location: index.php");
?>
