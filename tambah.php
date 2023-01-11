<?php 
require 'function.php';
if ( isset($_POST["submit"])) {


    if( tambah($_POST) > 0 ){
        echo "
        <script>
           alert('Data Berhasil Ditambahkan!!!');
           document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
           alert('Data Gagal Ditambahkan!!!');
           document.location.href = 'index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Registrasi</title>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>REGISTRASI SEKARANG!!</h1>
        
        <div class="btn-group">
          <a class="btn-item" href="index.php">Kembali</a>
          <a class="btn-item" href="">Pusat Bantuan</a>
        </div>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Tambahkan Data</h2>
        </div>
        <div class="info">
          <input class="fname" type="text" name="namasantri" id="namasantri" placeholder="namasantri" required>
          <input type="text" name="alamatsantri" id="alamatsantri" placeholder="alamatsantri" required>
          <input type="text" name="notelp" id="notelp" placeholder="notelp" required>
          <input type="text" name="namaayah" id="namaayah" placeholder="namaayah" required>
          <input type="text" name="namaibu" id="namaibu" placeholder="namaibu" required>
          
        </div>
        <div class="checkbox">
          <input type="checkbox" name="checkbox"><span>I agree to the <a href="">Privacy Poalicy</a></span>
        </div>
        <button type="submit" name="submit">Tambah Data Siswa</button>
      </form>
    </div>
  </body>
</html>