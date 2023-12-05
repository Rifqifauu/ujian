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
    <meta charset="UTF-8">
    <title>Posting Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    
</head>
<body>

<form action='buat-artikel.php' method="post" enctype="multipart/form-data">

    <div class='container-fluid'>
        <div class='row mt-5 d-flex justify-content-between'>
            <div class='col-md-5'>
                <textarea id="summernote" name="editordata"></textarea>
            </div>
            <div class='col-md-5'>
                <label for="name" class="form-label">Judul</label>
                <input type="text" class="form-control mb-3" name="judul">
                <label for="name" class="form-label">Penulis</label>
                <input type="text" class="form-control mb-3" name="penulis">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control mb-3" name="gambar">
                <button class='btn btn-success' name='submit' type='submit'>Posting</button>
                <a class='btn btn-danger' onClick="if(confirm('Apakah ingin membatalkan penulisan?')){window.location.href='data-artikel.php';}">Batal</a>            </div>
            </div>
        </div>
    </div>
</form>

<script>
    $('#summernote').summernote({
        placeholder: 'Tulis Artikel di Sini',
        tabsize: 2,
        height: 500,
        width: 700,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>

<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    // Mengambil nilai dari formulir
    $judul = mysqli_real_escape_string($koneksi, $_POST["judul"]);
    $penulis = mysqli_real_escape_string($koneksi, $_POST["penulis"]);
    $tanggal = date('Y-m-d'); // Ubah format tanggal
    $isi_konten = mysqli_real_escape_string($koneksi, $_POST["editordata"]);

    // File upload
    $targetDir = "images/";
    $fileName = basename($_FILES["gambar"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    // Memindahkan file ke direktori tujuan
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFilePath)) {
        // Query untuk menyimpan data ke dalam database
        $sql = "INSERT INTO artikel (judul, penulis, tanggal, isi_konten, gambar) VALUES ('$judul', '$penulis', '$tanggal', '$isi_konten', '$targetFilePath')";
        if ($koneksi->query($sql) === TRUE) {
            echo '<script>alert("Artikel berhasil Diunggah"); window.location.href = "data-artikel.php";</script>';
        } else {
            echo '<script>alert("Maaf, terjadi kesalahan saat menyimpan data ke dalam database")</script>' . $koneksi->error;
        }

        // Tutup koneksi database
        $koneksi->close();
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
    }
}
?>

</body>
</html>
