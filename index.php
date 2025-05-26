<!DOCTYPE html>
<html>
<head>
    <title>Sistem Permohonan Cuti ILP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <style>
        body {
            background: transparent;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .role-box {
            border: 2px solid #007bff;
            border-radius: 15px;
            padding: 30px 20px;
            text-align: center;
            transition: 0.3s;
            cursor: pointer;
            background-color: rgba(255, 255, 255, 0.8); /* translucent box */
        }

        .role-box:hover {
            background-color: #007bff;
            color: white;
            transform: scale(1.05);
        }

        .role-box img {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
        }
    </style>
<body>
    <div class="container ">
        <h1 class="mb-4 fw-bold text-center w-100">Sistem Permohonan Cuti ILP Kuala Langat</h1>
    <h2 class="text-center mb-5 fw-bold">Pilih Peranan Anda</h2>
    <div class="row justify-content-center">
      <!-- Kotak 1 -->
        <div class="col-md-3 mx-2">
            <a href="loginPelajar.php" class="text-decoration-none">
            <div class="role-box">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="Pelajar">
                <h5 class="mt-2">Pelajar</h5>
            </div>
            </a>
        </div>
      <!-- Kotak 2 -->
        <div class="col-md-3 mx-2">
            <a href="loginKb.php" class="text-decoration-none">
            <div class="role-box">
                <img src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png" alt="Ketua Bahagian">
                <h5 class="mt-2">Ketua Bahagian</h5>
            </div>
            </a>
        </div>
      <!-- Kotak 3 -->
        <div class="col-md-3 mx-2">
            <a href="loginBppl.php" class="text-decoration-none">
            <div class="role-box">
                <img src="https://cdn-icons-png.flaticon.com/512/3064/3064197.png" alt="BPPL">
                <h5 class="mt-2">BPPL</h5>
            </div>
            </a>
        </div>
    </div>
  </div>
</body>
</html>
