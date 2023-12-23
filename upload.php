<?php
require_once 'koneksi.php';

// // jika tombol daftar ditekan, ambil data dari form dan simpan ke database
if (isset($_POST['daftar'])) {
    // mengambil data yang diinputkan pada form pendaftaran
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];
    $semester = $_POST['semester'];
    $ipk = $_POST['ipk'];
    $jenis_beasiswa = $_POST['jenis_beasiswa'];
    $berkas = $_FILES['berkas']['name'];
    $status_ajuan = "belum di verifikasi";

    //folder tujuan upload file
    $target_dir = "data/";

    // nama file yang diupload beserta path-nya
    $target_file = $target_dir . basename($_FILES["berkas"]["name"]);

    // ekstensi file yang diupload
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //  simpan file ke folder tujuan upload
    move_uploaded_file($_FILES["berkas"]["tmp_name"], $target_file);

    //  query untuk memasukkan data ke database
    $query = "INSERT INTO pendaftar (nama, email, hp, semester, ipk, jenis_beasiswa, berkas, status_ajuan) 
	          VALUES ('$nama', '$email', '$hp', $semester, $ipk, '$jenis_beasiswa', '$berkas', '$status_ajuan')";

    //jalankan query dan simpan hasilnya
    $result = mysqli_query($sat, $query);

    // cek apakah query berhasil dijalankan atau tidak
    if ($result) {
        echo "<script>alert('Pendaftaran berhasil!');</script>";
    } else {
        echo "<script>alert('Pendaftaran gagal!');</script>";
    }
}

// menutup koneksi database
mysqli_close($sat);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beasiswa</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <!-- link css -->
    <link href="CSS/style.css" rel="stylesheet">

</head>

<body>

    <h1 class="site-heading text-center text-white d-none d-lg-block">
        <span class="site-heading-upper text-primary mb-3">Pendaftaran Beasiswa</span>
        <span class="site-heading-lower"style="font-size:smaller;"> Institut Teknologi Telkom Purwokerto</span>
    </h1>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">SERKOM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="index.php">Pilihan Beasiswa</a>
                    </li>
                    <li class="nav-item  px-lg-4">
                        <a class="nav-link text-uppercase text-dark" href="daftar.php">Daftar
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-uppercase text-dark" href="hasil.php">Hasil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="text-align:center; background-color: white; padding: 20px;">
    <h3 class="mt-5 text-black">Data Anda Berhasil Dikirim</h3>
    <p class="text-center text-black">
        Untuk melihat data, dan status pengecekan beasiswa anda, klik tombol <a href="hasil.php"><b>Hasil</b></a>
    </p>
</div>

    

    <!-- Bootstrap core JavaScript -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>