// // Validasi email
// function validateEmail(email) {
//   var re = /\S+@\S+\.\S+/;
//   return re.test(email);
// }

// // Validasi nomor HP
// function validatePhone(phone) {
//   var re = /^[0-9]*$/;
//   return re.test(phone);
// }

// // Validasi form sebelum submit
// function validateForm() {
//   var name = document.forms["beasiswaForm"]["nama"].value;
//   var email = document.forms["beasiswaForm"]["email"].value;
//   var phone = document.forms["beasiswaForm"]["phone"].value;
//   var semester = document.forms["beasiswaForm"]["semester"].value;
//   var file = document.forms["beasiswaForm"]["berkas"].value;

//   // Validasi nama
//   if (name == "") {
//     alert("Nama tidak boleh kosong");
//     return false;
//   }

//   // Validasi email
//   if (email == "") {
//     alert("Email tidak boleh kosong");
//     return false;
//   } else if (!validateEmail(email)) {
//     alert("Email tidak valid");
//     return false;
//   }

//   // Validasi nomor HP
//   if (phone == "") {
//     alert("Nomor HP tidak boleh kosong");
//     return false;
//   } else if (!validatePhone(phone)) {
//     alert("Nomor HP hanya boleh berisi angka");
//     return false;
//   }

//   // Validasi semester
//   if (semester == "") {
//     alert("Silahkan pilih semester saat ini");
//     return false;
//   }

//   // Validasi file upload
//   if (file == "") {
//     alert("Silahkan upload berkas syarat");
//     return false;
//   }

//   return true;
// }

// Script dijalankan saat halaman sudah siap ditampilkan.
$(document).ready(function () {
  // Menangani input dari user pada elemen dengan id 'nama' ketika terjadi event 'input'
  $("#nama").on("input", function () {
    // Mengambil nilai input dari elemen dengan id 'nama' yang diinputkan oleh user.
    var nama = $(this).val();

    // Melakukan ajax request ke server menggunakan fungsi ajax() dengan mengirim data berupa nama yang diinputkan oleh user pada form pendaftaran.
    $.ajax({
      url: "ipk.php",
      type: "post",
      data: {
        nama: nama,
      },

      // Ketika ajax request sukses, script akan mengambil nilai ipk yang diterima dari server dan memasukkan nilai tersebut ke dalam elemen dengan id 'ipk'. Jika nilai ipk kurang dari 3, maka tombol 'jenis_beasiswa', 'berkas', dan 'daftar' akan dinonaktifkan dengan menggunakan fungsi prop(). Jika nilai ipk lebih atau sama dengan 3, maka tombol-tombol tersebut akan diaktifkan kembali.
      success: function (response) {
        $("#ipk").val(response);
        if (response < 3) {
          $("#jenis_beasiswa").prop("disabled", true);
          $("#berkas").prop("disabled", true);
          $("#daftar").prop("disabled", true);
        } else {
          $("#jenis_beasiswa").prop("disabled", false);
          $("#berkas").prop("disabled", false);
          $("#daftar").prop("disabled", false);
        }
      },
    });
  });

  // Menangani input dari user pada elemen dengan id 'ipk' ketika terjadi event 'input'.
  $("#ipk").on("input", function () {
    // Mengambil nilai input dari elemen dengan id 'ipk' yang diinputkan oleh user.
    var ipk = $(this).val();

    // Jika nilai ipk kurang dari 3, maka tombol 'jenis_beasiswa', 'berkas', dan 'daftar' akan dinonaktifkan dengan menggunakan fungsi prop(). Jika nilai ipk lebih atau sama dengan 3, maka tombol-tombol tersebut akan diaktifkan kembali.
    if (ipk < 3) {
      $("#jenis_beasiswa").prop("disabled", true);
      $("#berkas").prop("disabled", true);
      $("#daftar").prop("disabled", true);
    } else {
      $("#jenis_beasiswa").prop("disabled", false);
      $("#berkas").prop("disabled", false);
      $("#daftar").prop("disabled", false);
    }
  });
});

// ambil elemen input file
var input = document.getElementById("berkas");

// tambahkan event listener pada input file
input.addEventListener("change", function () {
  // ambil nama file yang dipilih
  var namaFile = input.value.split("\\").pop();

  // ubah warna dan isi teks pada elemen p dengan id 'nama-file'
  var namaFileElement = document.getElementById("nama-file");
  namaFileElement.style.color = "white";
  namaFileElement.textContent = namaFile;
});
