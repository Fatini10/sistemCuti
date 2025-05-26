<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPPL</title>
</head>
<body>
    
<?php
include('headerKbBppl.php');
?>

<?php
session_start();
include('db.php');

if (!isset($_SESSION['id']) || $_SESSION['role'] != 'bppl') {
    header('Location: bppl.php');
    exit();
}

// Fetch data from each table based on status
$query = "SELECT * FROM permohonan WHERE status = 'Disokong'";
// $query_ = "SELECT * FROM permohonan WHERE status = 'Disokong'";

$result = $conn->query($query);
// $result_tpm = $conn->query($query_tpm);
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lulus Permohonan Cuti</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container py-4">
        <div class="content-wrapper">
            <header class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-4">
                <h1>DASHBOARD BPPL</h1>
            </header>

        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr style="text-align: center;">
                        <th>Bil</th>
                        <th>Nama</th>
                        <th>NDP</th>
                        <th>Bengkel</th>
                        <th>Sebab</th>
                        <th>Bukti</th>
                        <th>Tarikh Mula Cuti</th>
                        <th>Tarikh Tamat Cuti</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    include('db.php');
                    $sqlselect = "SELECT * FROM permohonan";
                     $result = mysqli_query($conn,$sqlselect);
                    while($data = mysqli_fetch_array($result)){
                ?>
                    <?php 
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td>
                                <?php echo $row['id']; ?>
                            </td>
                            <td>
                                <?php echo $data['nama']; ?>
                            </td>
                            <td>
                                <?php echo $data['ndp']; ?>
                            </td>
                            <td>
                                <?php echo $data['course']; ?>
                            </td>
                            <td>
                                <?php echo $data['sebab']; ?>
                            </td>
                            <td>
                                <?php if (!empty($row['bukti'])): ?>
                                <a href="<?php echo $row['bukti']; ?>" target="_blank">Lihat Bukti</a>
                                <?php else: ?>
                                    Tiada Bukti
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo $data['tarikh_mula']; ?>
                            </td>
                            <td>
                                <?php echo $data['tarikh_tamat']; ?>
                            </td>
                            
                            <td>
                                <a href="lulusAction.php?id=<?php echo $row['id']; ?>&bengkel=tpp" class="btn btn-primary">Lulus 'k'</a>
                                <a href="lulusAction.php?id=<?php echo $row['id']; ?>&bengkel=tpp&status=lulus0" class="btn btn-warning">Lulus '0'</a>
                                <a href="lulusAction.php?id=<?php echo $row['id']; ?>&bengkel=tpp&status=tolak" class="btn btn-danger">Tolak</a>
                            </td>
                        </tr>
                    <?php } ?>
                    
                    <!-- <php 
                    while ($row = $result_tpm->fetch_assoc()) { ?>
                        <tr>
                            <td><php echo $row['nama_penuh']; ?></td>
                            <td>TPM</td>
                            <td><php echo $row['cuti_dari']; ?></td>
                            <td><php echo $row['cuti_hingga']; ?></td>
                            <td>
                                <php if (!empty($row['bukti'])): ?>
                                    <a href="<php echo $row['bukti']; ?>" target="_blank">Lihat Bukti</a>
                                <php else: ?>
                                    Tiada Bukti
                                <php endif; ?>
                            </td>
                            <td>
                                <a href="lulusAction.php?id=<php echo $row['user_id']; ?>&bengkel=tpm" class="btn btn-primary">Lulus 'k'</a>
                                <a href="lulusAction.php?id=<php echo $row['user_id']; ?>&bengkel=tpm&status=lulus0" class="btn btn-warning">Lulus '0'</a>
                                <a href="lulusAction.php?id=<php echo $row['user_id']; ?>&bengkel=tpm&status=tolak" class="btn btn-danger">Tolak</a>
                            </td>
                        </tr>
                    <php } ?> -->

                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>

