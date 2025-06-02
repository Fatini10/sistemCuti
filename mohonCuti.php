<?php
session_start();
include('db.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle file upload for 'bukti'
    if (isset($_FILES['bukti']) && $_FILES['bukti']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';  // Ensure this directory exists and is writable
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create directory if it doesn't exist
        }
        $fileName = time() . "_" . basename($_FILES['bukti']['name']);
        $filePath = $uploadDir . $fileName;
        move_uploaded_file($_FILES['bukti']['tmp_name'], $filePath);
    } else {
        $filePath = null; // No file uploaded
    }

    // Retrieve form data
    $nama = $_POST['nama'];
    $ndp = $_POST['ndp'];
    $course = $_POST['course'];
    $sebab = $_POST['sebab'];
    $tarikh_mula = $_POST['tarikh_mula'];
    $tarikh_tamat = $_POST['tarikh_tamat'];

    // Determine the table name based on bengkel
    // $table = "permohonan_cuti_" . strtolower($bengkel);

    // Insert permohonan into the database
    $stmt = $conn->prepare("INSERT INTO permohonan (nama, ndp, course, sebab, bukti, tarikh_mula, tarikh_tamat, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'draf')");
    $stmt->bind_param("sssssss", $nama, $ndp, $course, $sebab, $filePath, $tarikh_mula, $tarikh_tamat);
    $stmt->execute();

    
   
    echo "<div class='alert alert-success'>Permohonan cuti berjaya dihantar!</div>";;
}
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Mohon Cuti</title>
</head>
<body>

<?php
include('header.php');
?>
    <!-- <h2>Mohon Cuti</h2> -->
    <!-- <form method="post" enctype="multipart/form-data">
        Nama Penuh: <input type="text" name="nama_penuh" required><br>
        Bengkel: 
        <select name="bengkel" required>
            <option value="TPP">TPP</option>
            <option value="TPM">TPM</option>
            <option value="TKR">TKR</option>
            <option value="CADDS">CADDS</option>
        </select><br>
        Tarikh Cuti Dari: <input type="date" name="cuti_dari" required><br>
        Tarikh Cuti Hingga: <input type="date" name="cuti_hingga" required><br>
        Bukti: <input type="file" name="bukti"><br>
        <button type="submit">Mohon Cuti</button>
    </form> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container my-5">


<!-- Butang kembali di luar kotak dan ke kanan -->
<div class="mb-3 text-end">
    <a href="pelajar.php" class="btn btn-primary">Kembali</a>
</div>

<div class="card shadow p-4">
    <h1 class="mb-4">Borang Permohonan Cuti</h1>
    <!-- borang bermula di sini -->

    <header class="d-flex justify-content-between my-4">
        <h1>Borang Permohonan Cuti</h1>
        <div>
            <a href="pelajar.php" class="btn btn-primary">Kembali</a>
        </div>
    </header>

    <div class="card shadow p-4">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Penuh</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Penuh" required>
            </div>

            <div class="mb-3">
                <label for="ndp" class="form-label">No NDP</label>
                <input type="text" placeholder="Masukkan NDP" class="form-control" name="ndp" required>
            </div>

            <div class="mb-3">
                <label for="course" class="form-label">Bengkel</label>
                <select name="course" class="form-select" required>
                    <option selected disabled>Choose Your Course</option>
                    <option value="TPP">TPP</option>
                    <option value="TPM">TPM</option>
                    <option value="TKR">TKR</option>
                    <option value="CADD">CADDS</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="sebab" class="form-label">Sebab</label>
                <input type="text" placeholder="Masukkan Sebab" class="form-control" name="sebab" required>
            </div>

            <div class="mb-3">
                <label for="bukti" class="form-label">Bukti</label>
                <input type="file" class="form-control" name="bukti" required>
            </div>

            <div class="mb-3">
                <label for="tarikh_mula" class="form-label">Tarikh Cuti Dari</label>
                <input type="date" class="form-control" name="tarikh_mula" required>
            </div>

            <div class="mb-3">
                <label for="tarikh_tamat" class="form-label">Tarikh Cuti Hingga</label>
                <input type="date" class="form-control" name="tarikh_tamat" required>
            </div>

            <div class="d-grid">
                <button type="submit" name="mohon" class="btn btn-primary">Mohon Cuti</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
