<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pelajar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php
include ('header.php');
?>
<!--------------->
<!-- Dashboard -->
<!--------------->
<div class="masuk">
        <div class="container py-4">
            <div class="content-wrapper">
                 <header class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-4">
                    <h1>DASHBOARD PELAJAR</h1>
                </header> 
                <?php
                session_start();
                if (isset($_SESSION["mohon"])){
                    ?>
                <div class= "alert alert-success">
                    <?php
                    echo $_SESSION["mohon"];
                    ?>
                    </div>
                <?php
                unset($_SESSION["mohon"]);
                }
                ?>
                <?php
                
                if (isset($_SESSION["update"])){
                    ?>
                <div class= "alert alert-success">
                    <?php
                    echo $_SESSION["update"];
                    ?>
                    </div>
                <?php
                unset($_SESSION["update"]);
                }
                ?>
                <?php

                if (isset($_SESSION["delete"])){
                    ?>
                <div class= "alert alert-success">
                    <?php
                    echo $_SESSION["delete"];
                    ?>
                    </div>
                <?php
                unset($_SESSION["delete"]);
                }
                ?>

            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                <thead class="table-light">
                    <tr style="text-align: center;">
                        <th>Bil</th>
                        <th>Nama</th>
                        <th>NDP</th>
                        <th>Bengkel</th>
                        <th>Sebab</th>
                        <th>Bukti</th>
                        <th>Tarikh Mula Cuti</th>
                        <th>Tarikh Tamat Cuti</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                

                <?php
                include('db.php');
                $sqlselect = "SELECT * FROM permohonan";
                $result = mysqli_query($conn,$sqlselect);
                while($data = mysqli_fetch_array($result)){
                    ?>

                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['ndp']; ?></td>
                        <td><?php echo $data['course']; ?></td>
                        <td><?php echo $data['sebab']; ?></td>
                        <td>
                                <?php if (!empty($row['bukti'])): ?>
                                <a href="<?php echo $row['bukti']; ?>" target="_blank">Lihat Bukti</a>
                                <?php else: ?>
                                    Tiada Bukti
                                <?php endif; ?>
                            </td>
                        <td><?php echo $data['tarikh_mula']; ?></td>
                        <td><?php echo $data['tarikh_tamat']; ?></td>
                        <td>
                            <?php if ($data['status'] == 'Belum Disokong' || $data['status'] == 'draf') { ?>
                                    <!-- <a href="sokongAction.php?id=<php echo $data['id']; ?>" class="btn btn-warning">Belum Disokong</a> -->
                                    <a href="sokongAction.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Belum Disokong</a>
                                <?php } elseif ($data['status'] == 'Sedang Diproses') { ?>
                                    <span class="badge bg-info text-dark">Disokong</span>
                                <?php } elseif ($data['status'] == 'Disahkan') { ?>
                                    <span class="badge bg-success">Disahkan</span>
                                <?php } elseif ($data['status'] == 'Ditolak') { ?>
                                    <span class="badge bg-danger">Ditolak</span>
                                <?php } else { ?>
                                    <span class="badge bg-secondary"><?php echo $data['status']; ?></span>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
                </table>
            </div>
            <!-- </div> -->
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
<center>
<footer>© 2025 Sistem Permohonan Cuti. Hak cipta terpelihara.</footer>
</center>
</html>
