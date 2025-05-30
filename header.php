<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Navbar Sistem Cuti Pelajar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .navbar-custom {
        position: relative;
        background-color:rgb(17, 110, 14);
        margin-bottom: 5%;
    }

    .navbar-center {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        color: #F0FFFF;
        /* margin-top: 5%; */
    }

    .navbar-nav .nav-link {
        position: relative;
        transition: color 0.3s;
        font-size: 1.2rem; /* Tukar nilai ikut keperluan, contoh 1.5rem utk lebih besar */
        font-weight: 500;
    }

    .navbar-nav .nav-link::after {
        content: "";
        position: absolute;
        width: 0%;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: white; /* atau warna lain ikut kesesuaian */
        transition: width 0.3s;
    }

    .navbar-nav .nav-link:hover::after {
        width: 100%;
    }

    @media (max-width: 991.98px) {
        .navbar-center {
            position: static;
            transform: none;
            text-align: center;
            width: 100%;
            margin-bottom: 10px;
        }
    }

  </style>
</head>
<body>

<!-- -------------- -->
<!-- navigation bar -->
<!-- -------------- -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
  <div class="container-fluid">

    <!-- Center title -->
    <div class="navbar-center text-white fw-bold fs-3">
      SISTEM PERMOHONAN CUTI
    </div>

    <!-- Toggler di kanan -->
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
      aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Right menu -->
    <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex flex-row gap-3">
        <!-- <li class="nav-item">
            <a class="nav-link active" href="#">Profile</a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link active" href="mohonCuti.php">Permohonan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="index.php">Logout</a>
        </li>
        </ul>
    </div>

  </div>
</nav>
<!------------------------>
<!-- End Navigation Bar -->
<!------------------------>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>