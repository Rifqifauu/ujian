<?php

include 'koneksi.php';

if (isset($koneksi)) {
    // Query SQL untuk mendapatkan informasi jawaban benar dan jawaban user
    $sql = "SELECT
                j.id_user,
                j.id_ujian,
                COUNT(CASE WHEN j.jawaban_user = s.jawaban THEN 1 ELSE NULL END) as jawaban,
                COUNT(CASE WHEN j.jawaban_user <> s.jawaban THEN 1 ELSE NULL END) as jawaban_salah,
                COUNT(CASE WHEN j.jawaban_user = s.jawaban THEN 1 ELSE NULL END) / COUNT(*) * 100 as nilai
            FROM
                jawaban_user j
            JOIN
                soal s ON j.id_soal = s.id_soal AND j.id_ujian = s.id_ujian
            GROUP BY
                j.id_user, j.id_ujian";

    $result = $koneksi->query($sql);

    // Memeriksa apakah query berhasil dieksekusi
    if ($result === false) {
        die("Error: " . $koneksi->error);
    }

    // Memproses hasil query
    while ($row = $result->fetch_assoc()) {
        $id_user = $row["id_user"];
        $id_ujian = $row["id_ujian"];
        $jawaban = $row["jawaban"];
        $jawaban_salah = $row["jawaban_salah"];
        $nilai = $row["nilai"];

        // Menjalankan query SELECT untuk memeriksa apakah data sudah ada
        $checkSql = "SELECT * FROM hasil_ujian WHERE id_user = '$id_user' AND id_ujian = '$id_ujian'";
        $checkResult = $koneksi->query($checkSql);

        // Memeriksa apakah query berhasil dieksekusi
        if ($checkResult === false) {
            die("Error: " . $koneksi->error);
        }

        // Jika data belum ada, maka lakukan INSERT
        if ($checkResult->num_rows == 0) {
            // Menjalankan query INSERT
            $insertSql = "INSERT INTO hasil_ujian (id_user, id_ujian, jawaban, jawaban_salah, nilai) 
                          VALUES ('$id_user', '$id_ujian', '$jawaban', '$jawaban_salah', '$nilai')";

            // Menjalankan query
            $insertResult = $koneksi->query($insertSql);

            // Memeriksa apakah query berhasil dieksekusi
            if ($insertResult === false) {
                die("Error: " . $koneksi->error);
            }
        }
    }
    header('Location: home.php');
    $koneksi->close();
} else {
    echo 'Gagal Terkoneksi ke Database';
}
?>
