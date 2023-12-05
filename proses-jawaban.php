<?php
session_start();

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'];
    $query_user = "SELECT * FROM user WHERE username='$username'";
    $result_user = mysqli_query($koneksi, $query_user);

    if ($result_user) {
        $row_user = mysqli_fetch_assoc($result_user);
        $id_user = $row_user['id_user'];

        // Ambil id_ujian dari sesi
        if (isset($_SESSION['id_ujian'])) {
            $id_ujian = $_SESSION['id_ujian'];

            // Ambil data jawaban dari formulir
            foreach ($_POST as $key => $value) {
                if (strpos($key, 'jawaban_') === 0) {
                    $id_soal = substr($key, strlen('jawaban_'));
                    $jawaban_user = mysqli_real_escape_string($koneksi, $value);

                    // Simpan jawaban ke database
                    $query_simpan_jawaban = "INSERT INTO jawaban_user (id_user, id_soal, id_ujian, jawaban_user) 
                                              VALUES ('$id_user', '$id_soal', '$id_ujian', '$jawaban_user')";
                    $result_simpan_jawaban = mysqli_query($koneksi, $query_simpan_jawaban);

                    if (!$result_simpan_jawaban) {
                        // Handle kesalahan saat menyimpan jawaban
                        echo "Error: " . mysqli_error($koneksi);
                    }
                }
            }

            // Tambahkan logika lainnya jika diperlukan
            mysqli_close($koneksi);
            header('location: hasil-ujian.php');
        } else {
            // Handle jika id_ujian tidak tersedia
            echo "Error: id_ujian not provided.";
        }
    } else {
        // Handle kesalahan saat mengambil data user
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    header("location: halaman_tidak_ditemukan.php");
    exit();
}
?>
