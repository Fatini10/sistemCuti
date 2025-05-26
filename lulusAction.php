<?php
session_start();
include('db.php');

$id = $_GET['id'];
$bengkel = $_GET['bengkel'];

// Update permohonan status to 'Diluluskan oleh BPPL'
$table = "permohonan_cuti_" . strtolower($bengkel);
$query = "UPDATE $table SET status = 'Diluluskan oleh BPPL' WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

// Notify Pelajar
$pelajarEmail = "pelajar@domain.com";
$subject = "Permohonan Cuti Diluluskan oleh BPPL";
$message = "Permohonan cuti anda telah diluluskan oleh BPPL. Sila rujuk sistem untuk maklumat lanjut.";
mail($pelajarEmail, $subject, $message, "From: 23223055ilpkls@gmail.com");

echo "Permohonan telah diluluskan dan notifikasi telah dihantar kepada Pelajar.";
?>
