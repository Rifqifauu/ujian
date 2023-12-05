<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
    .btn-dark {
    --bs-btn-color: #fff;
    --bs-btn-bg: #5B1F9C;
    --bs-btn-border-color: #5B1F9C;
    --bs-btn-hover-color: #5B1F9C;
    --bs-btn-hover-bg: #ffffff;
    --bs-btn-hover-border-color: #5B1F9C;
    --bs-btn-focus-shadow-rgb: 66, 70, 73;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #5B1F9C;
    --bs-btn-active-border-color: #5B1F9C;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    --bs-btn-disabled-color: #fff;
    --bs-btn-disabled-bg: #5B1F9C;
    --bs-btn-disabled-border-color: #5B1F9C;
}
</style>
</head>
<body>
<div class='container-fluid d-flex justify-content-center'>
    <div class='row mt-5' style='box-shadow: 0px 4px 4px 0px #5B1F9C; border-radius: 40px; width:55em'> 
            <div class='col-md-5 pt-5 ps-5'>
                <h4 class='pb-3'>Bergabung Bersama Kami</h4>
                <form action="register.php" method='post'>
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username">
                    <label for="email" class="form-label">Alamat Email </label>
                    <input type="text" class="form-control" name="email">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                    <button type='submit' name='submit' class='btn btn-dark btn-sm mt-3' style='width:7em'>Daftar</button>
                    <p class='mt-2'>Sudah punya akun? <a href="login.php" style='text-decoration:none;'><span>Login</span></a></p>
                </form>
            </div>
            <div class='col-md-6'>
                <img src="reg.jpg" style="max-width:110%" class=''>
            </div>
        </div>
</div>

    
</body>
<?php
if (isset($_POST['submit'])) {
    // Validasi apakah semua field diisi
    if (empty($_POST['nama']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        echo "<script>alert('Harap isi semua field!');</script>";
    } else {
        include 'koneksi.php';
        
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Cek apakah username sudah ada di database
        $cek_username = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($koneksi, $cek_username);

        if (mysqli_num_rows($result) > 0) {
            // Jika username sudah ada, tampilkan pesan kesalahan
            echo "<script>alert('Username sudah digunakan!');</script>";
        } else {
            // Jika username belum ada, lakukan penyisipan
            $insert = "INSERT INTO user (nama, username, password, email) VALUES ('$nama', '$username', '$password', '$email')";

            if (mysqli_query($koneksi, $insert)) {
                // Jika berhasil disisipkan, tampilkan pesan sukses
                echo "<script>alert('Registrasi Berhasil!'); window.location.href = 'login.php';</script>";
            } else {
                // Jika gagal, tampilkan pesan kesalahan
                echo "<script>alert('Error: " . mysqli_error($koneksi) . "');</script>";
            }
        }

        // Menutup koneksi ke database
        mysqli_close($koneksi);
    }
}
?>



</html>
<!-- end document-->