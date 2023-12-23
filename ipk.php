<?php
// Import file konfigurasi untuk menghubungkan ke database
require_once 'koneksi.php';

// Ambil nilai variabel 'nama' yang dikirim melalui metode POST dari file JavaScript
$nama = $_POST['nama'];

// Query untuk mengambil nilai ipk dari tabel pendaftar di database berdasarkan nama
$query = "SELECT ipk FROM pendaftar WHERE nama='$nama'";

// Jalankan query pada database dan simpan hasilnya di variabel $result
$result = mysqli_query($sat, $query);

// Cek apakah query menghasilkan data atau tidak. Jika ada, kirim nilai ipk ke file JavaScript, jika tidak kirimkan string kosong.
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo $row['ipk'];
} else {
    echo "";
}

// Tutup koneksi ke database untuk menghemat sumber daya server
mysqli_close($sat);
?>