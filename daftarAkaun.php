<?php
session_start();
include('db.php');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $ndp = $_POST['ndp'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role']; // or 'ketua bahagian' depending on the form

    if ($role === 'pelajar') {
        $course = $_POST['course'];
        $sql = "INSERT INTO user (nama, email, ndp, password, course) 
                VALUES ('$nama', '$email', $ndp, '$password', '$course')";

    } elseif ($role === 'kb') {
        $course = $_POST['course'];
        $sql = "INSERT INTO kb (nama, email, password, course, role) 
                VALUES ('$nama', '$email', '$password', '$course', 'ketua bahagian')";

    } elseif ($role === 'bppl') {
        $sql = "INSERT INTO bppl (nama, email, password, role) 
                VALUES ('$nama', '$email', '$password', 'bppl')";

    } else {
        die("Role tidak dikenali.");
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?signup=success");
        exit();

        // echo "Pendaftaran berjaya!";
        // Redirect ke halaman login atau dashboard
        // header("Location: login.php");
    } else {
        echo "Ralat: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Daftar Akaun</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <style>
        .signup-section {
            min-height: 100vh;
        }
        .form-container {
            max-width: 600px;
        }
        .img-side {
            background: url('signup.jpg') center center/cover no-repeat;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
    </style>
<body>
    <div class="container-fluid signup-section d-flex justify-content-center align-items-center bg-light">
        <div class="row shadow rounded overflow-hidden w-75">
            <div class="col-md-6 bg-white p-4 d-flex flex-column justify-content-center">
                <h3 class="mb-4">Sign Up</h3>
                <form action="daftarAkaun.php" method="POST" class="form-container">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Full Name</label>
                        <input type="text" name="nama" class="form-control" placeholder="Your full name" required />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="name@example.com" required />
                    </div>
                    <div class="mb-3">
                        <label for="ndp" class="form-label">NDP</label>
                        <input type="text" name="ndp" class="form-control" placeholder="Your NDP" required />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Create a password" required />
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Select Role</label>
                        <select name="role" id="roleSelect" class="form-select" required>
                        <option selected disabled>Choose a role</option>
                        <option value="pelajar">Pelajar</option>
                        <option value="kb">Ketua Bahagian</option>
                        <option value="bppl">BPPL</option>
                        </select>
                    </div>
                    <div class="mb-4" id="bengkel-section">
                        <label for="course" class="form-label">Select Course</label>
                        <select name="course" class="form-select">
                        <option selected disabled>Choose Your Course</option>
                        <option value="TPP">TPP</option>
                        <option value="TKR">TKR</option>
                        <option value="TPM">TPM</option>
                        <option value="CADD">CADD</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                </form>
                    <p class="text-center mt-3">Already have an account? <a href="index.php">Login</a></p>
            </div>
                <div class="col-md-6 img-side d-none d-md-block"></div>
        </div>
    </div>
    
    <script>
    // Sembunyi bahagian bengkel jika pilih BPPL
    document.getElementById('roleSelect').addEventListener('change', function() {
        const bengkelSection = document.getElementById('bengkel-section');
        if (this.value === 'bppl') {
            bengkelSection.style.display = 'none';
        } else {
            bengkelSection.style.display = 'block';
        }
    });
</script>
</body>
</html>
