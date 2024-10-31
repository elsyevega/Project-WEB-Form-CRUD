<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styless.css">
    <title>Register</title>
</head>
<body>
    <div class="wrapper">
        <h2>Buat Akun</h2>
        <form action="process_reg.php" method="POST">
            
            <div class="input-field">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="login">Daftar</button>
            <p>Already have an account? 
                <a href="log.php" class="sign-up">Login</a>
            </p>
        </form>
    </div>
</body>
</html>
