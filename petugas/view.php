<?php
include '../config.php';

$id_petugas = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM Petugas WHERE id_petugas = ?");
$stmt->execute([$id_petugas]);
$petugas = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="
