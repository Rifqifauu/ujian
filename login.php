<!<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
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
    <div class='row mt-5' style='box-shadow: 0px 4px 4px 0px #5B1F9C; border-radius: 40px; width:45em'> 
            <div class='col-md-5 pt-5 ps-5'>
                <h4 class='pb-3'>Masuk Ke Akun</h4>
                <form action="Login.php" method='post'>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                    <button type='submit' name='submit' class='btn btn-dark btn-sm mt-3' style='width:7em'>Masuk</button>
                    <p class='mt-2'>Belum punya akun? <a href="register.php" style='text-decoration:none;'><span>Daftar</span></a></p>
                </form>
            </div>
            <div class='col-md-6'>
                <img src="images/log.jpg" style="max-width:110%" class=''>
            </div>
        </div>
</div>

    
</body>
</html>
<!-- end document-->
<?php
session_start();

include "koneksi.php";
if(isset($_POST['submit'])){
$entered_username = $_POST['username'];
$entered_password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username = '$entered_username' AND password = '$entered_password'";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    // Periksa jumlah baris hasil query
    $notempty = mysqli_num_rows($query);

    if ($notempty == 1) {
        // Kredensial benar, inisialisasi sesi
        $_SESSION['username'] = $entered_username;

        // Redirect ke halaman dashboard atau halaman lain yang sesuai
        header("Location: home.php");
        exit();
    } else {
        // Kredensial salah, mungkin tampilkan pesan kesalahan atau redirect kembali ke halaman login
        echo "<script>alert('Password salah atau anda belum terdaftar')</script>";
    }
}
}
?>

</body>
</html>