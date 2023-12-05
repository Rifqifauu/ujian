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
    <title>Tables</title>

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
                    <img style='height:50px'src="images/logo.png"  alt="Sistem Ujian" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="js-arrow" href="index.php">
                               Ujian</a>
                        </li>
                        <li class="active has-sub">
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
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                                <th>Id</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Action</th>
                            
</thead>
                                        <?php
include "koneksi.php";
    $sql = "SELECT * FROM user";
    $query = mysqli_query($koneksi, $sql);

    if (!$query) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } else {
        while ($row = mysqli_fetch_array($query)) {
            if (!empty($row['id_user'])) {
                echo "
                <tr>
                    <td>" . $row['id_user'] . "</td>
                    <td>" . $row['nama'] . "</td>
                    <td>" . $row['username'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['password'] . "</td>
                    <td><a href='data-user.php?upd=" . $row['id_user'] . "'>Update</a> | 
                    <a href='data-user.php?del=" . $row['id_user'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a></td>
                </tr>";
            }
        }
    }
    ?>     
<?php 

include "koneksi.php";
if(isset($_GET['del'])){
$id_user = $_GET['del'];
$sql = "DELETE FROM user WHERE id_user = '$id_user' ";
$query = mysqli_query($koneksi, $sql);
if($query){
    ?>
    <script>alert('Data Berhasil Dihapus!'); document.location='data-user.php';</script>
    <?php
}
}

?>                                     </table>
                                </div>
                                <!-- END DATA TABLE-->
 <?php
include "koneksi.php";

if(isset($_GET['upd'])){
    $upd = $_GET['upd'];
    $sql = "select * from user where id_user='$upd' ";
    $query = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($query);
    if($hasil){
        ?>
          <div class="card">
                <div class="card-header">
                        <strong>Update</strong> Data
                </div>
                                    <div class="card-body card-block">
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>?upd=<?php echo $upd; ?>" method="post" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-nama" class=" form-control-label">Nama</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hf-nama" name="hf-nama" value="<?php echo $hasil['nama']; ?>" class="form-control">
                                                    <span class="help-block">Ubah Nama</span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-username" class=" form-control-label">Username</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="username" id="hf-username" name="hf-username" value="<?php echo $hasil['username']; ?>" class="form-control">
                                                    <span class="help-block">Ubah username</span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-username" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="hf-email" name="hf-email" value="<?php echo $hasil['email']; ?>" class="form-control">
                                                    <span class="help-block">Ubah email</span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="hf-password" name="hf-password" value="<?php echo $hasil['password']; ?>" class="form-control">
                                                    <span class="help-block">Ubah password</span>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-primary btn-sm" name="update" value="Update">
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                    </form>
                                </div>
        <?php
    }
}
if(isset($_POST['update'])){
    $upd = $_GET['upd'];
    $nama = $_POST['hf-nama'];
    $username = $_POST['hf-username'];
    $password = $_POST['hf-password'];
    $email = $_POST['hf-email'];
    $update = "UPDATE user SET nama='$nama', username='$username', password='$password', email='$email' WHERE id_user='$upd'";
    $query = mysqli_query($koneksi, $update);
    if($query){
        ?>
        <script>alert('Data Berhasil Diubah!'); document.location='data-user.php';</script>
        <?php
    }
}
?>
                            </div>
                        </div>
                    </div>
                </div>
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