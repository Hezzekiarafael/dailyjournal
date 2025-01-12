<?php
// Include file koneksi ke database
include "koneksi.php";

// Periksa apakah data dikirimkan melalui metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $judul = isset($_POST['judul']) ? mysqli_real_escape_string($conn, $_POST['judul']) : '';
    $deskripsi = isset($_POST['deskripsi']) ? mysqli_real_escape_string($conn, $_POST['deskripsi']) : '';
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    // Tentukan folder tujuan untuk upload file gambar
    $target_dir = "img/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true); // Buat folder jika belum ada
    }

    $target_file = $target_dir . basename($gambar);

   // Validasi apakah gambar berhasil diupload
if (move_uploaded_file($tmp_name, $target_file)) {
  // Jika upload berhasil, simpan data ke database
  $sql = "INSERT INTO gallery (judul, deskripsi, gambar, tanggal) VALUES ('$judul', '$deskripsi', '$gambar', NOW())";

  if ($conn->query($sql) === TRUE) {
      // Jika data berhasil disimpan
      echo "<script>
              alert('Gambar berhasil ditambahkan!');
              window.location.href='gallery.php';
            </script>";
  } else {
      // Jika terjadi kesalahan saat menyimpan ke database
      echo "<script>
              alert('Gagal menyimpan data ke database!');
              window.history.back();
            </script>";
  }
} else {
  // Jika upload file gagal
  echo "<script>
          alert('Gagal mengupload gambar!');
          window.history.back();
        </script>";
}
}
?>