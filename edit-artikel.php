<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>
<body>

<?php
include "koneksi.php";

if(isset($_GET['upd-artikel'])){
    $upd = $_GET['upd-artikel'];
    $sql = "SELECT * FROM artikel WHERE id_artikel='$upd'";
    $query = mysqli_query($koneksi, $sql);
    $hasil = mysqli_fetch_array($query);
    if($hasil){
        $konten = $hasil['isi_konten'];
        $konten = htmlspecialchars_decode($konten, ENT_NOQUOTES)
        ?>
        <form action='edit-artikel.php' method="post" enctype="multipart/form-data">
            <div class='container-fluid'>
                <div class='row mt-5 d-flex justify-content-between'>
                    <div class='col-md-5'>
                    <textarea id="summernote" name="editordata"><?php echo $konten ?></textarea>
                    </div>
                    <div class='col-md-5'>
                        <label for="name" class="form-label">Judul</label>
                        <input type="text" class="form-control mb-3" name="judul" value ="<?php echo $hasil['judul']?>">
                        <label for="name" class="form-label">Penulis</label>
                        <input type="text" class="form-control mb-3" name="penulis" value ="<?php echo $hasil['penulis']?>">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control mb-3" name="gambar">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $upd ?>">
                        <button class='btn btn-success' name='submit' type='submit'>Edit</button>
                        <a class='btn btn-danger' onClick="if(confirm('Apakah ingin membatalkan pengeditan?')){window.location.href='data-artikel.php';}">Batal</a>
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
    }
}?>

<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    // Mengambil nilai dari formulir
    $id = mysqli_real_escape_string($koneksi, $_POST["id"]);
    $judul = mysqli_real_escape_string($koneksi, $_POST["judul"]);
    $penulis = mysqli_real_escape_string($koneksi, $_POST["penulis"]);
    $tanggal = date('Y-m-d'); // Ubah format tanggal
    $isi_konten = mysqli_real_escape_string($koneksi, $_POST["editordata"]);

    // File upload
    $targetDir = "images/";
    $fileName = basename($_FILES["gambar"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $uploadOk = 1;

    // Cek apakah gambar baru diunggah
    if (!empty($fileName)) {
        // Hapus gambar lama jika ada
        $oldImage = $koneksi->query("SELECT gambar FROM artikel WHERE id_artikel=$id")->fetch_assoc()['gambar'];
        if (!empty($oldImage) && file_exists($oldImage)) {
            unlink($oldImage);
        }

        // Unggah gambar baru
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFilePath)) {
            $sql = "UPDATE artikel SET judul='$judul', penulis='$penulis', tanggal='$tanggal', isi_konten='$isi_konten', gambar='$targetFilePath' WHERE id_artikel=$id";
            if(mysqli_query($koneksi, $sql)) {
                $koneksi->close();
                echo "<script>alert('Berhasil Memperbarui Artikel');window.location.href='data-artikel.php';</script>";
            } else {
                echo "<script>alert('Gagal Mengirim ke Database')</script>";
            }
        } else {
            echo "<script>alert('Gagal Mengunggah Gambar')</script>";
            $uploadOk = 0;
        }
    } else {
        // Jika tidak ada gambar baru
        $sql = "UPDATE artikel SET judul='$judul', penulis='$penulis', tanggal='$tanggal', isi_konten='$isi_konten' WHERE id_artikel=$id";
        if(mysqli_query($koneksi, $sql)) {
            $koneksi->close();
            echo "<script>alert('Berhasil Memperbarui Artikel');window.location.href='data-artikel.php';</script>";
        } else {
            echo "<script>alert('Gagal Mengirim ke Database')</script>";
        }
    }
}
?> 

</body>
</html>
