<?php
session_start();
?>

<?php
include 'koneksi.php';
if(isset($_SESSION['username'])){
$username = $_SESSION['username'];
$query = "SELECT nama FROM user WHERE username='$username'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

// Get the 'nama' value from the array
$nama = $row['nama'];
}
else{
    $nama ='Di Situs Kami';
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
                <a class="nav-link active" style="border-bottom: 2px solid #5B1F9C;" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item ps-5">
                <a class="nav-link" href="ujian.php">Ujian</a>
            </li>
            <li class="nav-item ps-5">
                <a class="nav-link" href="artikel.php">Artikel</a>
            </li>
            <li class="nav-item ps-5">
                <a class="nav-link" href="kontak.php">Kontak</a>
            </li>
            <li class="nav-item ps-5">
                <a class="nav-link" href="profil.php"><?php echo $nama ?></span></a>
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
    <div class="row mt-3 pt-5 ms-2">
    <div class="col-sm-5 ms-5 pt-2">
        <h1>Selamat Datang</h1>
        <div style='height:3em;overflow:hidden;'>
        <h2 class="typewriter-text" style='color: #5B1F9C;'> </h2>
        </div>
        <p class='pt-4'style='max-width: 85%'>Kami menghadirkan <span>solusi inovatif </span>untuk mengukur setiap <span>pengetahuan </span>dan <span> keterampilan</span> Anda dengan cara yang <span>memikat </span>dan <span> efektif</span>.</p>
        <button class="btn btn-dark btn-sm mt-3" style="width:8em;border-radius: 10px;box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);" onclick="location.href='ujian.php'">Mulai</button>
    </div>
    <div class="col-sm-6 pe-4"><img src="images/banner.jpg" style="width:85%" class="pb-5 rounded float-end" alt="...">
</div>
  </div>
</div>

<script>
        document.addEventListener('DOMContentLoaded', function () {
        var text = '<?php echo $nama ?>';
        var index = 0;
        var speed = 250;

        function typeWriter() {
            if (index < text.length) {
                document.querySelector('.typewriter-text').innerHTML += text.charAt(index);
                index++;
                setTimeout(typeWriter, speed);
            } else {
                // Typing complete, reset index and clear text
                index = 0;
                document.querySelector('.typewriter-text').innerHTML = '';
                // Start typing again after a delay
                setTimeout(typeWriter, 1000); // Adjust the delay as needed
            }
        }

        // Start the typewriter effect when the page is loaded
        typeWriter();
    });
    Barba.Pjax.start();
</script>

</body>
</html>