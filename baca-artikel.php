
<?php
session_start();
?>
<?php 
include 'koneksi.php';
if (isset($_GET['baca'])){
$id_artikel = $_GET['baca'];
$sql = "SELECT * FROM artikel WHERE id_artikel = '$id_artikel'";
$result = mysqli_query($koneksi,$sql);

$hasil = mysqli_fetch_array($result);

$judul = $hasil['judul'];
$penulis = $hasil['penulis'];
$gambar = $hasil['gambar'];
$tanggal = $hasil['tanggal'];
$tanggal = new DateTime($tanggal);

// Mengubah format tanggal menjadi "12 Desember 2023"
$tanggal = $tanggal->format('d F Y');

$konten = $hasil['isi_konten'];
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
    <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="container-fluid pt-2">
    <div class='navbar navbar-expand-lg' style='box-shadow: 0px 4px 40px 0px rgba(0, 0, 0, 0.10);'>
        <a class='nav-brand'><img src="" alt="ini adalah gambar logo"></a>
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
    </div>
    <a style="text-decoration: none;color:#5B1F9C;cursor:pointer;margin-left:5em" onclick="location.href='artikel.php'"><i class="fa fa-angle-double-left"></i>
&nbsp;Kembali ke halaman utama</a>
    <div class="d-flex mt-3 justify-content-center vh-100">
    <div class="row mt-3" style="width:80%">
    <div class='row d-flex justify-content-center'>
    <h2 class='text-center mt-3 mb-5'><?php echo $judul?></h2>
    <img style='max-width:50em;max-height:20em;object-fit:cover;'src="<?php echo $gambar ?>" alt="">
    <div class='col-md-11 mt-5 pt-5 pb-5' style='border-radius: 30px; box-shadow: 0px 2px 2px 0px #5b1f9c;'>
    <div class="info-container d-flex justify-content-between align-items-center p-3">
            <span>Oleh <span><?php echo $penulis?></span></span>
            <?php echo $tanggal?>
        </div>
    <div class='content pt-2 ps-3 pb-2 pe-5'>
    <?php echo $konten ?>
</div>

</div>
 </div>
</div>
</div>
</div>
<script>
</script>

</body>