<?php
include '../config.php';

$id_anggota = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM Anggota WHERE id_anggota = ?");
$stmt->execute([$id_anggota]);

header("Location: index.php");
?>
