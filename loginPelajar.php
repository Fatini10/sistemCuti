<?php
session_start();
include('db.php'); // Database connection

// $error = ''; // Untuk mesej ralat

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password fields are set
    // if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Prepare SQL query to check email and password in the database
        $query = "SELECT * FROM user WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                
                // Verify the password
                if (password_verify($password, $user['password'])) {
                    // Set session variables and redirect
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $user['role'];
                    
                    // Redirect to mohonCuti.php
                    if ($user['role'] == 'pelajar') {
                        // Redirect to sokongCuti.php for ketua bahagian
                        header("Location: pelajar.php");
                        exit();
                    } else {
                        // If not ketua bahagian, handle other roles
                        $error = "Invalid role.";
                    }
                } else {
                    $error = "Invalid password.";
                }
            } else {
                $error = "Invalid email.";
            }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pelajar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <style>
        .signup-section {
            min-height: 100vh;
        }
        .form-container {
            max-width: 400px;
        }
        .img-side {
            background: url('signup.jpg') center center/cover no-repeat;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
    </style>
<body>
    <div class="container-fluid signup-section d-flex justify-content-center align-items-center bg-light">
        <div class="row shadow rounded overflow-hidden" style="max-width: 800px; width: 100%;">
            <div class="col-md-6 bg-white p-4 d-flex flex-column justify-content-center">
                <h3 class="mb-4 fw-bold text-center w-100">LOGIN PELAJAR</h3>

                 <!-- Mesej Ralat -->
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form action="loginPelajar.php" method="POST" class="form-container">
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="name@example.com" required />
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter a password" required />
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                    <p class="text-center mt-3">Tiada Akaun? <a href="daftarAkaun.php">SignUp</a></p>
                </form>
            </div>
                <div class="col-md-6 img-side d-none d-md-block"></div>
        </div>
    </div>
</body>
</html>
