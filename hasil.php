<?php
require_once 'koneksi.php'; // mengimpor konfigurasi koneksi database

$query = "SELECT * FROM pendaftar"; // menyimpan query untuk mengambil seluruh data pendaftar
$result = mysqli_query($sat, $query); // mengeksekusi query dan menyimpan hasilnya pada variabel $result
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Beasiswa</title>
  <!-- link css -->

  <link rel="stylesheet" href="CSS/home.css" />
  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
    <!-- link chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        canvas {
            display: block;
            margin: auto;
        }
    </style>
</head>

<body>
  
<section class="home">
  <h1 class="site-heading text-center text-white d-none d-lg-block $zindex-dropdown:">
    <span class="site-heading-upper text mb-3 ">Pendaftaran Beasiswa</span>
    <span class="site-heading-lower"style="font-size:smaller;"> Institut Teknologi Telkom Purwokerto</span>
  </h1>

  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-dark font-weight-bold d-lg-none" href="#">SERKOM</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item  px-lg-4">
            <a class="nav-link text-uppercase text-dark" href="index.php">Pilihan Beasiswa</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-dark" href="daftar.php">Daftar
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="hasil.php">Hasil</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </section>
  <!-- Navbar END -->
    <div class="container">
        <h1 class="text-center mt-5 mb-5 text-white">Tabel Hasil Pendaftaran</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Semester</th>
                    <th>IPK</th>
                    <th>Jenis Beasiswa</th>
                    <th>Berkas</th>
                    <th>Status Ajuan</th>
                </tr>
            </thead>

            <tbody>

                <!-- mengambil data secara berulang dari variabel $result hingga data yang tersedia habis. -->
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                    <!-- akan ditampilkan data dalam bentuk tabel dengan menggunakan tag <tr> untuk setiap baris data, dan tag <td> untuk setiap kolom data yang diambil dari variabel $row sesuai dengan nama kolom di tabel database. 
                    Nilai dari setiap kolom data tersebut ditampilkan menggunakan fungsi echo untuk mencetak nilainya ke dalam HTML.
                     -->
                    <tr>
                        <td>
                            <?php echo $row['nama']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php echo $row['hp']; ?>
                        </td>
                        <td>
                            <?php echo $row['semester']; ?>
                        </td>
                        <td>
                            <?php echo $row['ipk']; ?>
                        </td>
                        <td>
                            <?php echo $row['jenis_beasiswa']; ?>
                        </td>
                        <td>
                            <?php echo $row['berkas']; ?>
                        </td>
                        <td>
                            <?php echo $row['status_ajuan']; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <div class="container" style="position: relative; height: 40vh; width: 80vw;">
        <h1 class="text-center mt-5 mb-5 text-white">Diagram Lingkaran Hasil Pendaftaran</h1>
        <canvas id="myChart" width="500" height="500"></canvas>
        <script src="JS/jquery.min.js"></script>
  <script src="JS/bootstrap.bundle.min.js"></script>
  <script src="JS/script.js"></script>
        <script>
            // Membuat koneksi ke database dan mengambil data jenis_beasiswa dan jumlah pendaftar menggunakan query. Hasil query disimpan dalam array $data.
            <?php
            $sat = mysqli_connect('localhost', 'root', '', 'db_beasiswa');
            $query = mysqli_query($sat, "SELECT jenis_beasiswa, COUNT(*) AS jumlah FROM pendaftar GROUP BY jenis_beasiswa");
            $data = array();
            while ($row = mysqli_fetch_assoc($query)) {
                // Mengubah kode jenis_beasiswa menjadi nama jenis_beasiswa, kemudian menyimpan data ke dalam array $data.
                $jenis_beasiswa = '';
                if ($row['jenis_beasiswa'] == 'prestasi akademik') {
                    $jenis_beasiswa = 'Beasiswa Prestasi Akademik';
                } else if ($row['jenis_beasiswa'] == 'prestasi non akademik') {
                    $jenis_beasiswa = 'ormawa';
                } else if ($row['jenis_beasiswa'] == 'ormawa') {
                    $jenis_beasiswa = 'Beasiswa Ormawa';
                } else if ($row['jenis_beasiswa'] == 'mahasiswa aktif') {
                    $jenis_beasiswa = 'Beasiswa Mahasiswa Aktif';
                } else if ($row['jenis_beasiswa'] == 'kip kuliah') {
                $jenis_beasiswa = 'Beasiswa KIP Kuliah';
                }
                $data[] = array(
                    'jenis_beasiswa' => $jenis_beasiswa,
                    'jumlah' => $row['jumlah'],
                );
            }
            ?>
            // Menyiapkan data untuk grafik lingkaran dengan menggunakan objek data. Label jenis_beasiswa dan data jumlah pendaftar dimasukkan ke dalam objek data menggunakan json_encode. Warna untuk setiap bagian grafik lingkaran juga ditentukan di sini.
            var data = {
                labels: <?php echo json_encode(array_column($data, 'jenis_beasiswa')); ?>,
                datasets: [{
                    data: <?php echo json_encode(array_column($data, 'jumlah')); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)', // Merah Muda
                        'rgba(54, 162, 235, 0.7)', // Biru
                        'rgba(255, 206, 86, 0.7)', // Kuning
                        'rgba(75, 192, 192, 0.7)', // Cyan
                        'rgba(255, 159, 64, 0.7)', // Orange
                    ],
                },],
            };

            // Membuat grafik lingkaran
            // memilih element HTML tempat grafik akan ditampilkan
            var ctx = document.getElementById('myChart').getContext('2d');
            // membuat objek Chart dan menambahkan data dan option
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: data,
                options: {
                    // menambahkan judul pada grafik
                    title: {
                        display: true,
                        text: 'Persentase Peminatan Beasiswa',
                        fontColor: 'white',
                        fontSize: 20
                    },
                    // menonaktifkan responsif pada grafik
                    responsive: false,
                    // menonaktifkan pengaturan rasio aspek pada grafik
                    maintainAspectRatio: false,
                    // mengatur padding pada grafik
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 0
                        }
                    },
                    legend: {
                        labels: {
                            fontColor: 'white',
                            fontSize: 14,
                        },
                        // mengatur posisi legenda ke tengah
                        position: 'center',
                    },
                    // menambahkan teks berwarna putih pada label sumbu x dan y
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontColor: 'white',
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Jumlah Pendaftar',
                                fontColor: 'white',
                                fontSize: 14,
                            },
                        },],
                        xAxes: [{
                            ticks: {
                                fontColor: 'white',
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Jenis Beasiswa',
                                fontColor: 'white',
                                fontSize: 14,
                            },
                        },],
                    },
                },
            });
        </script>
    </div>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <div class="container" style="position: relative; height: 40vh; width: 80vw; margin: 0 auto;">
        <h1 class="text-center mt-5 mb-5 text-white">Diagram Batang Hasil Pendaftaran</h1>
        <canvas id="myBarChart" width="600" height="600"></canvas>
        <script>
            // Membuat objek data untuk grafik batang
            var dataBar = {
                // menambahkan label dari jenis beasiswa pada objek data menggunakan json_encode
                labels: <?php echo json_encode(array_column($data, 'jenis_beasiswa')); ?>,
                // menambahkan data jumlah pendaftar pada objek data menggunakan json_encode
                datasets: [{
                    label: "Jumlah Pendaftar",
                    data: <?php echo json_encode(array_column($data, 'jumlah')); ?>,
                    backgroundColor: [
                        'rgba(255, 182, 193, 0.7)', // Merah Muda
'rgba(173, 216, 230, 0.7)', // Biru
'rgba(255, 236, 139, 0.7)',// Kuning
'rgba(173, 216, 230, 0.7)', // Cyan
'rgba(255, 192, 153, 0.7)', // Orange
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 0.7)', // Merah Muda
'rgba(54, 162, 235, 0.7)', // Biru
'rgba(255, 206, 86, 0.7)', // Kuning
'rgba(75, 192, 192, 0.7)', // Cyan
'rgba(255, 159, 64, 0.7)', // Orange
                    ],
                    borderWidth: 1
                }]
            };
        </script>
       
    </div>



</body>

</html>

<?php
mysqli_close($sat);
?>