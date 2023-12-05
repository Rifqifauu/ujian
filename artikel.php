<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ujian Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="container-fluid pt-2">
    <div class='navbar navbar-expand-lg' style='box-shadow: 0px 4px 40px 0px rgba(0, 0, 0, 0.10);'>
        <a class='nav-brand'><img style='height:50px'src="images/logo.png"  alt="ini adalah gambar logo"></a>
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
                <a class="nav-link active" style="border-bottom: 2px solid #5B1F9C;" href="artikel.php">Artikel</a>
            </li>
            <li class="nav-item ps-5">
                <a class="nav-link" href="kontak.php">Kontak</a>
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
    <div class='d-flex mt-4 justify-content-center'>
    <h2>Baca Artikel</h2>
    </div>
    <div class="d-flex mt-3 justify-content-center vh-100">
    <div class="row mt-3" style="width:80%">
<?php 
include 'koneksi.php';

$sql = 'select * from artikel';
$result = mysqli_query($koneksi, $sql);

while ($hasil = mysqli_fetch_array($result)) {
    echo "
        <div class='col-md-4 text-center'>
            <div class='d-flex flex-column align-items-center'>
                <div class='card' style='width: 90%; border-radius: 10px; box-shadow: 0px 2px 2px 0px #5b1f9c;'>
                    <img src='{$hasil['gambar']}' class='card-img-top' alt='...'>
                    <h5 class='pt-2'>{$hasil['judul']}</h5>
                    <p>{$hasil['penulis']}&nbsp;<span>({$hasil['tanggal']})</span></p>
                </div>
            </div><form action='baca-artikel.php' method='get'>
            <input type='hidden' name='baca' value='{$hasil['id_artikel']}' />
            <button type='submit' class='btn btn-md btn-dark mt-3' style='width: 90%;'>Baca Sekarang</button>
            </form>
        </div>
    ";
}

// Close the connection
mysqli_close($koneksi);
?>

</div>
        </div>
    </div>
</div>

</div>
<script>
$(document).ready(function(){
    $('.card-img-top').css('width', 'auto');
    $('.card-img-top').css('height', '220px');
    $('.card-img-top').css('object-fit', 'cover');
    $('.card').css('width', '270px');
    $('.card').css('height', '350px');
    $('.card').css('object-fit', 'cover');
});
</script>

</body>