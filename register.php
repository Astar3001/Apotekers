<?php
session_start();

// Cek apakah form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari form
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi password yang cocok
    if ($password !== $confirm_password) {
        $error_message = "Password dan konfirmasi password tidak cocok!";
    } else {
        // Proses penyimpanan pengguna (misalnya ke database atau file)
        // Contoh ini menyimpan ke file (untuk penyimpanan lebih lanjut gunakan database)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Misalkan kita menyimpan data pengguna dalam sebuah array di session (di database lebih baik)
        $_SESSION['users'][$username] = ['email' => $email, 'password' => $hashed_password];
        
        // Menyimpan pesan sukses atau mengarahkan ke halaman login
        $_SESSION['username'] = $username;
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
</head>
<body>
    <h2>Register</h2>

    <!-- Menampilkan pesan error jika ada -->
    <?php
    if (isset($error_message)) {
        echo "<p style='color:red;'>$error_message</p>";
    }
    ?>

    <!-- Form Register -->
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>