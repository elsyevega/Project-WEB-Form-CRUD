<?php
session_start();  // Memulai session
$conn = new mysqli("localhost", "root", "", "user_db");  // Koneksi ke database

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses Pendaftaran
if (isset($_POST['signup'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password
    

    $query = "INSERT INTO user (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $email, $password);

    if ($stmt->execute()) {
        echo "<p>User berhasil terdaftar.</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }
}

// Proses Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['email'];  // Simpan username di session
            $_SESSION['gender'] = 
            header("Location: process_log.php");  // Arahkan ke halaman utama
            exit();
        } else {
            echo "<p>Password salah.</p>";
        }
    } else {
        echo "<p>User tidak ditemukan.</p>";
    }
}
?>



        
  





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styless.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login Form</title>
</head>
<body>
    
    <div class="wrapper">
        <h2>Login Form</h2>
        <form action="#">
        <form action="process_login.php" method="POST">
            
            <div class="input-field">
                <input type="email" name="email" placeholder="Email" required>
                <i class-hx="bxs-user"></i>

            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <a href="#" class="forgot"><p>Forgot password?</p></a>
            <button type="submit" class="login">Login</button>

            <p>Don't have an account? 
                <a href="register.php" class="sign-up">Register</a>
            </p>
        </form>
    </div>
    
</body>
</html>
