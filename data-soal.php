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
                        <li>
                            <a href="data-user.php">
                               Pengguna</a>
                        </li>
                        <li class="active has-sub">
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
        <h2>Data Soal</h2>
    </div>

    <div class="col-md-12">
        <br>

        <!-- DATA TABLE -->
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <div class="rs-select2--light rs-select2--md">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='GET'>
                        <select class="js-select2" name="property" onchange="this.form.submit()">
                            <?php
                            include 'koneksi.php';

                            $sql = "SELECT * FROM ujian";
                            $query = mysqli_query($koneksi, $sql);

                            if ($query) {
                                while ($hasil = mysqli_fetch_assoc($query)) {
                                    $nama_ujian = $hasil['nama_ujian'];
                                    $selected = (isset($_GET['property']) && $_GET['property'] == $nama_ujian) ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $nama_ujian; ?>" <?php echo $selected; ?>><?php echo $nama_ujian; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                </form>
            </div>

        </div>

        <div class="table-responsive table-responsive-data2" style="overflow-x: auto;">
    <table class="table table-data2" style="max-width: 100%;">
                <thead class="table">
                <tr>
                    <th>Nama Ujian</th>
                    <th>Soal</th>
                    <th>Opsi A</th>
                    <th>Opsi B</th>
                    <th>Opsi C</th>
                    <th>Opsi D</th>
                    <th>Jawaban</th>
                    <th>Id_Soal</th>
                    <th class='text-center' colspan='3'>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include 'koneksi.php';

                if (isset($_GET['property'])) {
                    $nama_ujian_selected = $_GET['property'];

                    $sql_ujian = "SELECT id_ujian FROM ujian WHERE nama_ujian = '$nama_ujian_selected'";
                    $query_ujian = mysqli_query($koneksi, $sql_ujian);

                    if ($query_ujian) {
                        $result_ujian = mysqli_fetch_assoc($query_ujian);
                        $id_ujian = $result_ujian['id_ujian'];

                        $sql_soal = "SELECT * FROM soal WHERE id_ujian = '$id_ujian'";
                        $query_soal = mysqli_query($koneksi, $sql_soal);

                        if ($query_soal) {
                            while ($row = mysqli_fetch_array($query_soal)) {
                                echo "
                                <tr>
                                    <td>" . $nama_ujian_selected . "</td>
                                    <td>" . $row['soal'] . "</td>
                                    <td>" . $row['opsi_a'] . "</td>
                                    <td>" . $row['opsi_b'] . "</td>
                                    <td>" . $row['opsi_c'] . "</td>
                                    <td>" . $row['opsi_d'] . "</td>
                                    <td>" . $row['jawaban'] . "</td>
                                    <td>" . $row['id_soal'] . "</td>
                                    <td>
                                        <a href='data-soal.php?del-soal=" . $row['id_soal'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "Error: " . $sql_soal . "<br>" . mysqli_error($koneksi);
                        }
                    }
                }
                ?>
                </tbody>
            </table>
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