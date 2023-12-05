<?php
session_start();
?>
<?php 
include 'koneksi.php';
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM user WHERE username = '$username'";
    $sql = mysqli_query($koneksi, $query);
    $hasil = mysqli_fetch_array($sql);   
    $nama = $hasil['nama'];
    $email = $hasil['email'];
} else {
    $nama = '';
    $email = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ujian Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/barba.js"></script>
</head>

<body>
<div class="container-fluid pt-2">
    <div class='navbar navbar-expand-lg' style='box-shadow: 0px 4px 40px 0px rgba(0, 0, 0, 0.10);'>
        <a class='nav-brand'><img style='height:50px'src="images/logo.png" alt="ini adalah gambar logo"></a>
        <div class="navbar-nav ms-5 ps-5"></div>
        <div class="navbar-nav ms-5 ps-5"></div>
        <div class="navbar-nav ms-5 ps-5"></div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ps-3"> <!-- Tambahkan class ml-3 di sini -->
            <li class="nav-item ps-5">
                <a class="nav-link" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item ps-5">
                <a class="nav-link" href="ujian.php">Ujian</a>
            </li>
            <li class="nav-item ps-5">
                <a class="nav-link "  href="artikel.php">Artikel</a>
            </li>
            <li class="nav-item ps-5">
                <a class="nav-link active" style="border-bottom: 2px solid #5B1F9C;" href="kontak.php">Kontak</a>
            </li>
        </ul>
        <?php 
    if (!isset($_SESSION['username'])) {
        echo '<button class="btn btn-dark btn-sm me-4" onclick="location.href=\'login.php\'">Log In</button>';
    } else {
        echo '<button class="btn btn-danger btn-sm me-4" onclick="location.href=\'logout-user.php\'">Log Out</button>';
    }
?>
    </div>
    <h2 class='text-center pt-3 pb-3'>Hubungi Kami</h2>
    <div class='d-flex row justify-content-center pt-3 pb-3'>
        <div class='col-sm-4'>
        <form action="kontak.php" method='post'>
        <label for="name" class="form-label">Your Name</label>
        <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value='<?php echo $nama ?>'>
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" name="email" value='<?php echo $email ?>' aria-describedby="emailHelp">
        <label for="message" class="form-label">Your Message</label>
        <textarea class='form-control'name="message"></textarea>
        <button type='submit' name='submit' class='btn btn-dark  btn-sm mt-3'>Kirim Pesan</button>
        </form>
        </div>
        <div class='col-sm-5'>
        <iframe class="ps-5 ms-3" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.3252250268056!2d109.33453177500142!3d-7.4292161425814705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6559814ade5b79%3A0xaef1b7bab5cba0f0!2sFakultas%20Teknik%20Universitas%20Jenderal%20Soedirman!5e0!3m2!1sid!2sid!4v1700840263544!5m2!1sid!2sid" width="100%" height="100%" style="border-radius:50px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div> 
    </div>
    <?php 
if(isset($_POST['submit'])){
    include 'koneksi.php';    
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $message =$_POST['message'];
    $insert ="INSERT INTO pesan (nama,email,pesan) VALUES ('$nama','$email','$message')";
    if(mysqli_query($koneksi, $insert)){
        // Jika berhasil disisipkan, tampilkan pesan sukses
        echo "<script>alert('Pesan Terkirim!');document.location.href='kontak.php';</script>";
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        echo "<script>alert('Error: " . mysqli_error($koneksi) . "');</script>";
    }

    // Menutup koneksi ke database
    mysqli_close($koneksi);
}
?>
<script>
    Barba.Pjax.start();
</script>
</body>