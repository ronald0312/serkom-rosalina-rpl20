<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Beasiswa</title>
  <!-- link css -->
  <link rel="stylesheet" href="CSS/style.css" />
  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text mb-3 ">Pendaftaran Beasiswa</span>
    <span class="site-heading-lower"style="font-size:smaller; color:#b6252a;"> Institut Teknologi Telkom Purwokerto</span>
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
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="daftar.php">Daftar
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
  <!-- Navbar END -->


  <!-- form perndaftaran beasiswa -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <form action="upload.php" method="post" enctype="multipart/form-data" class="mb-5">
        <h2 class="text-center mt-4 mb-4 text-dark">Form Pendaftaran Beasiswa</h2>
          <div class="form-group">
            <label for="nama" class="text-dark">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="form-group">
            <label for="email" class="text-dark">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="hp" class="text-dark">Nomor HP</label>
            <input type="tel" class="form-control" id="hp" name="hp" pattern="[0-9]+" required>
          </div>
          <div class="form-group">
            <label for="semester" class="text-dark">Semester Saat Ini</label>
            <select class="form-control" id="semester" name="semester" required>
              <option value="" disabled selected>-- Pilih Semester --</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
            </select>
          </div>
          <div class="form-group">
            <label for="ipk" class="text-dark">IPK</label>
            <input type="number" step="0.1" class="form-control" id="ipk" name="ipk" required>
          </div>
          <div class="form-group">
            <label for="beasiswa" class="text-dark">Pilihan Beasiswa</label>
            <select class="form-control" id="jenis_beasiswa" name="jenis_beasiswa" required>
              <option value="" disabled selected>-- Pilih Beasiswa --</option>
              <option value="prestasi akademik">Beasiswa Prestasi Akademik</option>
              <option value="prestasi non akademik">Beasiswa Prestasi Non Akademik</option>
              <option value="ormawa">Beasiswa Ormawa</option>
              <option value="mahasiswa aktif">Beasiswa Mahasiswa Aktif</option>
              <option value="kip kuliah">Beasiswa KIP Kuliah</option>
            </select>
          </div>
          <div class="form-group">
            <label for="berkas" class="text-dark"> Upload Berkas Syarat</label>
            <div class="col-sm-10">
              <input type="file" class="form-control-file" id="berkas" name="berkas" accept=".pdf,.jpg,.jpeg,.png,.zip"
                required>
              <p id="nama-file" class="text-dark"></p>
            </div>
          </div>

          <button type="submit" class="btn btn-success" id="daftar" name="daftar" disabled>Daftar</button>
          <button type="reset" class="btn btn-danger" name="batal" id="batal">Batal</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Form END -->

  

  <!-- Bootstrap core JavaScript -->
  <script src="JS/jquery.min.js"></script>
  <script src="JS/bootstrap.bundle.min.js"></script>
  <script src="JS/script.js"></script>
</body>

</html>