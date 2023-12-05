<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
 <?php
    include 'koneksi.php';
    $username = $_SESSION['username'];
    $sql = "SELECT * from user WHERE username='$username';";
    $query = mysqli_query($koneksi, $sql);
    $hasil = mysqli_fetch_array($query);
    $nama = $hasil['nama'];
    $email = $hasil['email'];
    $password = $hasil['password'];
    if(!$hasil['foto_profil'])
    $foto_profil = 'images/pp.jpeg';
    else{
    $foto_profil = $hasil['foto_profil'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Profil</title>
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
    <div class='mt-3 me-5 d-flex justify-content-end'><a style="text-decoration: none;color:#5B1F9C;cursor:pointer;position:absolute;" onclick="location.href='home.php'"><i class="fa fa-angle-double-left"></i>
&nbsp;Kembali ke halaman utama</a></div>
        <div class='row mt-5' style='box-shadow: 0px 4px 4px 0px #5B1F9C; border-radius: 30px; width:45em;height:25em;'>
            <div class='col-md-3'>
                <div class='img-upload pt-4'>
                    <label for="file" name='file'>
                    <img id="previewImage" src='<?php echo $foto_profil ?>' style="width:10em; height:13em" class='rounded mt-5 ms-5'>
                        <input id='file' type="file" style='display:none;' onchange="previewFile()" disabled>
                    </label>
                </div>
            </div>
            <div class='col-md-5 pt-5 ms-5 ps-5'>
                <div id="profil-group">
                    <label for="nama">Nama</label>
                    <p><strong><?php echo $nama ?></strong></p>
                    <label for="username">Username</label>
                    <p><strong><?php echo $username ?></strong></p>
                    <label for="email">Email</label>
                    <p><strong><?php echo $email ?></strong></p>
                    <label for="password">Password</label>
                    <p><strong>********</strong></p>
                </div>
                <div id="form-group" style='display:none;'>
                    <form method="post" action="profil.php" enctype="multipart/form-data">
                        <input type="hidden" name="image_path" id="image_path" value="">
                        <label for="nama">Nama</label>
                        <input type='text' name='nama' class='form-control' value='<?php echo $nama ?>'>
                        <label for="username" name='username'>Username</label>
                        <input type='text' class='form-control' value='<?php echo $username ?>'>
                        <label for="email">Email</label>
                        <input type='email' name='email' class='form-control' value='<?php echo $email ?>'>
                        <label for="password">Password</label>
                        <input type='password' name='password' class='form-control' value='<?php echo $password ?>'>
                        <button type='submit' id='simpan' class='btn btn-md btn-dark' onclick="simpan()">Simpan</button>
                        <button id='batal' class='btn btn-md btn-danger' onclick="simpan()">Batal</button>
                    </form>
                </div>
                <button id='edit' class='btn btn-md btn-dark' onclick="toggleForm()">Edit Profil</button>
            </div>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Path gambar dapat diakses menggunakan $_POST['image_path']
        $imagePath = $_POST['image_path'];
        $nama = $_POST['nama'];
        $username = $_SESSION['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "UPDATE user SET nama=?, email=?, password=?, foto_profil=? WHERE username=?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "sssss", $nama, $email, $password, $imagePath, $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if($stmt){
        header("Location:profil.php");
    }}
?>


    <script>
        function toggleForm() {
            var profilGroup = document.getElementById('profil-group');
            var formGroup = document.getElementById('form-group');
            var edit = document.getElementById('edit');
            var simpan = document.getElementById('simpan');

            // Ambil path gambar dari input file
            var imagePath = document.getElementById('file').value;

            // Simpan path gambar ke dalam input tersembunyi
            document.getElementById('image_path').value = imagePath;

            profilGroup.style.display = 'none';
            edit.style.display = 'none';
            formGroup.style.display = 'block';
            simpan.style.marginTop = '1em';
            batal.style.marginTop = '1em';
            var fileInput = document.getElementById('file');

// Aktifkan input file
fileInput.removeAttribute('disabled');

            
        }

        function simpan() {
            var profilGroup = document.getElementById('profil-group');
            var formGroup = document.getElementById('form-group');
            var edit = document.getElementById('edit');
            var simpan = document.getElementById('simpan');
            profilGroup.style.display = 'block';
            formGroup.style.display = 'none';
            edit.style.marginTop = '0';
            simpan.style.marginTop = '0';
        }

        function previewFile() {
            var preview = document.getElementById('previewImage');
            var fileInput = document.getElementById('file');
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "images/pp.jpeg"; // Gambar default jika tidak ada file yang dipilih
            }
        }
    </script>
</body>

</html>
<!-- end document-->
