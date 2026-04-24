<?php
include 'koneksi.php';

if (isset($_POST['register'])) {

    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $username  = mysqli_real_escape_string($conn, $_POST['username']);
    $email     = mysqli_real_escape_string($conn, $_POST['email']);
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // cek username
    $cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah digunakan!'); window.history.back();</script>";
        exit();
    }

    // cek email
    $cek_email = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        echo "<script>alert('Email sudah terdaftar!'); window.history.back();</script>";
        exit();
    }

    // insert data
    $query = "INSERT INTO user (full_name, username, email, pass) 
              VALUES ('$full_name', '$username', '$email', '$password')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Registrasi Berhasil! Silakan Login.');
                window.location.href='login.php';
              </script>";
        exit();
    } else {
        echo "<script>alert('Registrasi gagal: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
}
?>