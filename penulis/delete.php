<?php
include '../config.php';

$id_penulis = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM Penulis WHERE id_penulis = ?");
$stmt->execute([$id_penulis]);

header("Location: index.php");
?>
