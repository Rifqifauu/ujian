<?php
session_start();

include 'koneksi.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $id_user = $row['id_user'];
        $nama = $row['nama'];
    } else {
        header("location:login.php");
        exit();
    }
} else {
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Jawaban Ujian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .info {
            margin-top: 7em !important;
            position: sticky;
            border-radius: 5px;
            box-shadow: 0px 2px 2px 0px #5b1f9c;
            width: 300px;
            height: 150px;
        }

        .btn-dark:hover {
            background-color: #5b1f9c;
            color: #ffffff;
        }
    </style>
</head>
<body>
<div class='container-fluid'>
    <div class='row d-flex justify-content-center'>
        <h2 class='text-center mt-3'>Ujian <?php echo $_GET['nama'] ?></h2>
        <div class='col-md-7 mt-5 mb-5 pt-5 pb-5' style='border-radius: 30px; box-shadow: 0px 2px 2px 0px #5b1f9c;'>
            <form action="proses-jawaban.php" method="post" id='jawabanForm'>
                <!-- Looping untuk menampilkan setiap soal dari tabel soal -->
                <?php
                // Assuming 'nama_ujian' is the parameter from the URL
                if (isset($_GET['nama'])) {
                    $nama_ujian = $_GET['nama'];

                    // Ambil id_ujian dari tabel ujian berdasarkan nama_ujian
                    $id_ujian_query = "SELECT * FROM ujian WHERE nama_ujian = '$nama_ujian'";
                    $result_id_ujian = mysqli_query($koneksi, $id_ujian_query);

                    if ($result_id_ujian) {
                        $row_id_ujian = mysqli_fetch_assoc($result_id_ujian);
                        $id_ujian = $row_id_ujian['id_ujian'];
                        $waktu = $row_id_ujian['waktu'];
                        $_SESSION['id_ujian'] = $id_ujian;

                        // Gunakan ID ujian untuk mengambil data dari tabel soal
                        $query = "SELECT * FROM soal WHERE id_ujian = $id_ujian";
                        $result = mysqli_query($koneksi, $query);

                        // Iterasi melalui hasil query dan menampilkan informasi soal
                        $nomor = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<strong><p>$nomor ." . " {$row['soal']}</p></strong>";
                            echo "<label class='mb-2'><input type='hidden' name='jawaban_{$row['id_soal']}' value='N'></label><br>";
                            echo "<label class='mb-2'><input type='radio' name='jawaban_{$row['id_soal']}' value='A'> {$row['opsi_a']}</label><br>";
                            echo "<label class='mb-2'><input type='radio' name='jawaban_{$row['id_soal']}' value='B'> {$row['opsi_b']}</label><br>";
                            echo "<label class='mb-2'><input type='radio' name='jawaban_{$row['id_soal']}' value='C'> {$row['opsi_c']}</label><br>";
                            echo "<label class='mb-2'><input type='radio' name='jawaban_{$row['id_soal']}' value='D'> {$row['opsi_d']}</label><br><br>";
                            $nomor++;
                        }
                        

                        mysqli_close($koneksi);
                    } else {
                        // Handle kesalahan saat mengambil id_ujian
                        echo "Error: " . mysqli_error($koneksi);
                    }
                } else {
                    echo "Nama_ujian not provided.";
                }
                ?>
        </div>
        <div class='info col-md-3 ms-5 mt-2 pt-2' style="position: -webkit-sticky; position: sticky; top: 0;">
            <p class='pt-2'><strong>Nama Peserta: <span><?php echo $nama ?></span></strong></p>
            <p id="waktuPengerjaan">Sisa Waktu Pengerjaan: <span id="countdown"></span></p>
            <button class='btn btn-sm ps-2 btn-dark mb-2' type="submit" onClick="return confirm('Apakah ingin menyelesaikan ujian?');">Kirim Jawaban</button>
            </form><button class='btn btn-sm ps-2 btn-danger mb-2' onClick="if(confirm('Apakah ingin membatalkan ujian?')){window.location.href='ujian.php';}">Batalkan Ujian</button>
        </div>
    </div>
</div>
<script>
var waktuPengerjaan = <?php echo $waktu * 60; ?>; // Konversi menit ke detik

// ...
// Fungsi untuk menghitung mundur waktu
function hitungMundur() {
    var menit = Math.floor(waktuPengerjaan / 60);
    var detik = waktuPengerjaan % 60;

    // Tampilkan waktu pada elemen dengan id "countdown"
    document.getElementById("countdown").innerHTML = menit + "m " + detik + "s";

    // Kurangi waktu
    waktuPengerjaan--;

    // Jika waktu habis
    if (waktuPengerjaan < 0) {
        // Tampilkan pesan di console untuk debugging
        console.log("Waktu pengerjaan habis.");

        // Tampilkan alert waktu habis
        alert("Waktu pengerjaan habis.");

        // Submit jawaban
        submitJawaban();
    } else {
        // Atur timeout untuk menjalankan fungsi hitungMundur setiap detik
        setTimeout(hitungMundur, 1000);
    }
}

// Fungsi untuk mengirim jawaban
function submitJawaban() {
    // Tampilkan pesan di console untuk debugging
    console.log("Mengirim jawaban...");

    // Submit form dengan id "jawabanForm"
    document.getElementById('jawabanForm').submit();
    // Tambahkan logika pengiriman jawaban di sini jika diperlukan
}

// Mulai hitung mundur
hitungMundur();




</script>

</body>
</html>
