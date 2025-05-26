<?php
session_start();
include('db.php');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare statement to select user from database
    $query = "SELECT * FROM bppl WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['bengkel'] = $user['bengkel'];

            // Check the role and redirect accordingly
            if ($user['role'] == 'bppl') {
                // Redirect to sokongCuti.php for ketua bahagian
                header("Location: bppl.php");
                exit();
            } else {
                // If not ketua bahagian, handle other roles
                echo "Invalid role.";
            }
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid email.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login BPPL</title>
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
        <div class="row shadow rounded overflow-hidden" style="max-width: 800px; width: 100%;">
            <div class="col-md-6 bg-white p-4 d-flex flex-column justify-content-center">
                <h3 class="mb-4 fw-bold text-center w-100">LOGIN BPPL</h3>
                <form action="loginBppl.php" method="POST" class="form-container">
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="name@example.com" required />
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Create a password" required />
                    </div>
                    
                    <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                    <p class="text-center mt-3">Tiada Akaun? <a href="daftarAkaun.php">SignUp</a></p>
                </form>
            </div>
                <div class="col-md-6 img-side d-none d-md-block"></div>
        </div>
    </div>
    <!-- <div class="container">
        <h2 class="mt-5">Log Masuk BPPL</h2>
        <php if (isset($error)) { ?>
            <div class="alert alert-danger"><php echo $error; ?></div>
        <php } ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password (No K/P)</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Log Masuk</button>
        </form>
    </div> -->
</body>
</html>
