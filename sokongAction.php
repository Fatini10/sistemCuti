<?php
session_start();
include('db.php');


if ($_SESSION['role'] != 'ketua bahagian') {
    header("Location: loginKb.php");
    exit();
}

$id = $_GET['id'];

// 1. Tandakan KB sudah sokong
mysqli_query($conn, "UPDATE permohonan SET sokongan_kb = 1 WHERE id = '$id'");

// 2. Semak status BPPL
$result = mysqli_query($conn, "SELECT pengesahan_bppl FROM permohonan WHERE id = '$id'");
$data = mysqli_fetch_assoc($result);

// 3. Tentukan status keseluruhan dan status_bppl
if ($data['pengesahan_bppl'] == 1) {
    $status = 'Disahkan';
    $status_bppl = 'Disahkan';
} elseif ($data['pengesahan_bppl'] == 2) {
    $status = 'Ditolak';
    $status_bppl = 'Ditolak';
} else {
    $status = 'Sedang Diproses'; // dihantar ke BPPL
    $status_bppl = 'Sedang Diproses'; // dihantar ke BPPL
}

// 4. Kemas kini status utama dan status_bppl dalam pangkalan data
$stmt = $conn->prepare("UPDATE permohonan SET status = ?, pengesahan_bppl = ? WHERE id = ?");
$stmt->bind_param("ssi", $status, $pengesahan_bppl, $id);
$stmt->execute();

// 5. Kembali ke dashboard
header("Location: kb.php");
exit();
// // 1. Tandakan KB sudah sokong
// mysqli_query($conn, "UPDATE permohonan SET sokongan_kb = 1 WHERE id = '$id'");

// // 2. Semak status BPPL
// $result = mysqli_query($conn, "SELECT pengesahan_bppl FROM permohonan WHERE id = '$id'");
// $data = mysqli_fetch_assoc($result);

// // 3. Tentukan status keseluruhan
// if ($data['pengesahan_bppl'] == 1) {
//     $status = 'Disahkan';
// } elseif ($data['pengesahan_bppl'] == 2) {
//     $status = 'Ditolak';
// } else {
//     $status = 'Sedang Diproses'; // dihantar ke BPPL
// }

// // 4. Kemas kini status utama
// mysqli_query($conn, "UPDATE permohonan SET status = '$status' WHERE id = '$id'");

// // 5. Kembali ke dashboard
// header("Location: dashboardKb.php");
// exit();

echo "Permohonan telah disokong dan notifikasi telah dihantar kepada BPPL.";
?>
