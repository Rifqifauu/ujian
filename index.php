<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin.php");
    exit();
}
$admin_username = $_SESSION['admin_username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img style='height:50px'src="images/logo.png" alt="Sistem Ujian" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                               Ujian</a>
                        </li>
                        <li>
                            <a href="data-user.php">
                               Pengguna</a>
                        </li>
                        <li>
                            <a href="data-soal.php">
                            Soal</a>
                        </li>
                        <li>
                            <a href="data-hasil.php">
                            Hasil Ujian</a>
                        </li>
                        <li>
                            <a href="data-artikel.php">
                            Artikel</a>
                        </li>
                        <li>
                            <a href="data-pesan.php">
                            Pesan</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." disabled />
                                <button class="au-btn--submit" type="submit" disabled>
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="" alt="Admin1" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $admin_username?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="" alt="<?php echo $admin_username?>" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $admin_username?></a>
                                                    </h5>
                                                </div>
</div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <h2>Selamat Datang <?php echo $admin_username ?>!</h2>
                </div>
                <div class="col-md-12">
                    <br>
                                <!-- DATA TABLE -->
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>

                                    </div>
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='POST'>
                                    <div class="table-data__tool-right">
                                    <input class="au-btn au-btn-icon au-btn--green au-btn--small" type='submit' name='tambah' value='Tambah Ujian'></form>
                                </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                    <thead class="table">
                                            <tr>
                                                <th>Id Ujian</th>
                                                <th>Nama Ujian</th>
                                                <th>Jumlah Soal</th>
                                                <th>Waktu Pengerjaan</th>
                                                <th class='text-center' colspan='3'>Action</th>
                                            </tr>
                                        </thead>
<?php
include "koneksi.php";
    $sql = "SELECT * FROM ujian";
    $query = mysqli_query($koneksi, $sql);

    if (!$query) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } else {
        while ($row = mysqli_fetch_array($query)) {
            if (!empty($row['id_ujian'])) {
                echo "
                <tr>
                    <td>" . $row['id_ujian'] . "</td>
                    <td>" . $row['nama_ujian'] . "</td>
                    <td>" . $row['jumlah_soal'] . '&nbsp;butir' ."</td>
                    <td>" . $row['waktu'] . '&nbsp;menit' ."</td>
                    <td><a href='index.php?upd=" . $row['id_ujian'] . "'>Edit</a></td>
                    <td><a href='index.php?soal=" . $row['id_ujian'] . "'>Buat Soal</a></td>
                    <td><a href='index.php?del=" . $row['id_ujian'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus Ujian</a></td>
                </tr>";
            }
        }
    }
    ?>    
<?php 

include "koneksi.php";
if(isset($_GET['del'])){
$id_ujian = $_GET['del'];
$sql = "DELETE FROM ujian WHERE id_ujian = '$id_ujian' ";
$query = mysqli_query($koneksi, $sql);
}

?>                        
                                           
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                            <br>
<?php
include "koneksi.php";
if(isset($_POST['tambah'])){
    ?>
                         <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Tambah</strong>Ujian
                                    </div>
                                    <div class="card-body card-block">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="hf-nama" class="form-control-label">Nama Ujian</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="text" id="hf-nama" name="hf-nama" class="form-control">
            <span class="help-block"></span>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="hf-gambar" class="form-control-label">Pilih Gambar</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="file" id="hf-gambar" name="hf-gambar" class="form-control">
            <span class="help-block"></span>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="hf-username" class="form-control-label">Jumlah Soal</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="text" id="hf-username" name="hf-jumlah" class="form-control">
            <span class="help-block">Butir</span>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="hf-waktu" class="form-control-label">Waktu</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="number" id="hf-waktu" name="hf-waktu" class="form-control">
            <span class="help-block">Menit</span>
        </div>
    </div>
    <div class="card-footer">
        <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Submit">
        <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Reset
        </button>
        <button class="btn btn-secondary btn-sm">
            Batal
        </button>
    </div>
</form>

                                </div>
            </div>
            <?php 
    }?>
<?php
include "koneksi.php";
if(isset($_GET['upd'])){
$upd = $_GET['upd'];
$sql = "select * from ujian where id_ujian='$upd' ";
$query = mysqli_query($koneksi,$sql);
$hasil = mysqli_fetch_array($query);
if($hasil){
    ?>
                         <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Edit </strong>Ujian
                                    </div>
                                    <div class="card-body card-block">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?upd=<?php echo $upd; ?>" method="post" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-nama" class=" form-control-label">Nama Ujian</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hf-nama" name="hf-nama" class="form-control" value="<?php echo $hasil['nama_ujian']; ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-username" class=" form-control-label">Jumlah Soal</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="username" id="hf-username" name="hf-jumlah" class="form-control" value="<?php echo $hasil['jumlah_soal']; ?>">
                                                    <span class="help-block">Butir</span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-username" class=" form-control-label">Waktu</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="hf-email" name="hf-waktu"  class="form-control" value="<?php echo $hasil['waktu']; ?>">
                                                    <span class="help-block">Menit</span>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-primary btn-sm" name="update" value="Update">
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                        <button class="btn btn-secondary btn-sm">
                                            Batal
                                        </button>
                                    </div>
                                    </form>
                                </div>
    </div>

        <?php 
    }
}
if(isset($_POST['update'])){
        $upd = $_GET['upd'];
        $nama_ujian = $_POST['hf-nama'];
        $jumlah_soal = $_POST['hf-jumlah'];
        $waktu = $_POST['hf-waktu'];
        $update = "UPDATE ujian SET nama_ujian='$nama_ujian', jumlah_soal='$jumlah_soal', waktu='$waktu' WHERE id_ujian=$upd";
        $query = mysqli_query($koneksi, $update);
        if($query){
            ?>
            <script>alert('Data Berhasil Diubah!'); document.location='index.php';</script>
            <?php
           
        }
    }
    ?>
<?php
include 'koneksi.php';

if (isset($_GET['soal'])) {
    $id_ujian = $_GET['soal'];
    $query = "SELECT * FROM ujian WHERE id_ujian = $id_ujian";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $jumlah_soal = $row['jumlah_soal'];
        $nama_ujian = $row['nama_ujian'];
?>
        <div class="container mt-5">
            <h3>Tambah Soal <?php echo $nama_ujian; ?></h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?soal=<?php echo $id_ujian; ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="nomor_soal">Pilih Nomor Soal:</label>
                    <select class="form-control" name="nomor_soal" id="nomor_soal">
                        <?php
                        for ($i = 1; $i <= $jumlah_soal; $i++) {
                            echo "<option value='$i'>Soal $i</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="soal">Pertanyaan:</label>
                    <textarea class="form-control" name="pertanyaan" id="pertanyaan" rows="4" cols="50"></textarea>
                </div>

                <div class="form-group">
                    <label for="pilihan_a">Pilihan A:</label>
                    <input type="text" class="form-control" name="pilihan_a" id="pilihan_a">
                </div>

                <div class="form-group">
                    <label for="pilihan_b">Pilihan B:</label>
                    <input type="text" class="form-control" name="pilihan_b" id="pilihan_b">
                </div>

                <div class="form-group">
                    <label for="pilihan_c">Pilihan C:</label>
                    <input type="text" class="form-control" name="pilihan_c" id="pilihan_c">
                </div>
                <div class="form-group">
                    <label for="pilihan_d">Pilihan D:</label>
                    <input type="text" class="form-control" name="pilihan_d" id="pilihan_d">
                </div>

                <div class="form-group">
                    <label for="jawaban">Jawaban:</label>
                <select class="form-control" name="jawaban" id="jawaban">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                </div>

                <!-- Add other form elements and submit button here -->
                <button type="submit" class="btn btn-primary" name='soal'>Submit</button>
                <button class="btn btn-secondary"> Batal </button>
            </form>
        </div>
<?php
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
<?php 
include 'koneksi.php';
if(isset($_POST['soal'])){
$id_ujian = $_GET['soal'];
$id_soal = $id_ujian . $_POST['nomor_soal'];
$soal = $_POST['pertanyaan'];
$opsi_a = $_POST['pilihan_a'];
$opsi_b = $_POST['pilihan_b'];
$opsi_c = $_POST['pilihan_c'];
$opsi_d = $_POST['pilihan_d'];
$jawaban = $_POST['jawaban'];
$query = "INSERT INTO soal (id_soal,soal,opsi_a,opsi_b,opsi_c,opsi_d,jawaban,id_ujian) values ('$id_soal','$soal','$opsi_a','$opsi_b','$opsi_c','$opsi_d','$jawaban','$id_ujian');";
$sql = mysqli_query($koneksi, $query);
if ($sql) {
    ?>
    <script>alert('Soal Berhasil Ditambahkan');document.location='index.php';</script>
    <?php
} 
}
?>
<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    // Mengambil nilai dari formulir
    $namaUjian = $_POST["hf-nama"];
    $jumlahSoal = $_POST["hf-jumlah"];
    $waktu = $_POST["hf-waktu"];

    // File upload
    $targetDir = "images/";
    $fileName = basename($_FILES["hf-gambar"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    // Memindahkan file ke direktori tujuan
    if (move_uploaded_file($_FILES["hf-gambar"]["tmp_name"], $targetFilePath)) {
        // Query untuk menyimpan data ke dalam database
        $sql = "INSERT INTO ujian (nama_ujian, gambar, jumlah_soal, waktu) VALUES ('$namaUjian', '$targetFilePath', '$jumlahSoal', '$waktu')";

        if ($koneksi->query($sql) === TRUE) {
            echo "Data berhasil disimpan ke dalam database.";
        } else {
            echo "Maaf, terjadi kesalahan saat menyimpan data ke dalam database: " . $koneksi->error;
        }

        // Tutup koneksi database
        $koneksi->close();
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
    }
}
?>

    
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>




</body>

</html>
<!-- end document-->