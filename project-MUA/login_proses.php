<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $email    = mysqli_real_escape_string($conn, $_POST['email'] ?? $_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' OR username = '$email'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['pass'])) {
            $_SESSION['login']   = true;
            $_SESSION['user_id'] = $row['id_user'];
            $_SESSION['email']   = $row['email'];
            $_SESSION['role']    = $row['role'];
            $_SESSION['username'] = $row['username'];

            // redirect berdasarkan role
            if ($row['role'] == 'admin') {
                header("Location: halaman.php");
            } else {
                header("Location: halaman.php");
            }
            exit;
        }
    }

    header("Location: login.php?error=Email atau password salah!");
    exit;

} else {
    header("Location: login.php");
    exit;
}
?>