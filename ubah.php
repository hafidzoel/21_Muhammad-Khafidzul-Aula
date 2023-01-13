<?php 
require 'function.php';
$id = $_GET["id"];
$alamatsantri = query("SELECT * FROM siswa WHERE id = $id")[0];
if ( isset($_POST["submit"])) {

    if( ubah($_POST) > 0 ){
        echo "
        <script>
           alert('Data Berhasil Diubah!!!');
           document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
           alert('Data Gagal Diubah!!!');
           document.location.href = 'index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ubah</title>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Ubah Data Santri</h1>
        
        <div class="btn-group">
          <a class="btn-item" href="index.php">Kembali</a>
          <a class="btn-item" href="">Pusat Bantuan</a>
        </div>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Ubah Data</h2>
        </div>
        <div class="info">
        <input type="hidden" name="id" value="<?= $alamatsantri["id"];?>">
        <input type="hidden" name="gambarLama" value="<?= $alamatsantri["gambar"];?>">
          <input class="fname" type="text" name="namasantri" id="namasantri" required value="<?= $alamatsantri["namasantri"];?>" placeholder="namasantri">
          <input type="text" name="alamatsantri" id="alamatsantri" required value="<?= $alamatsantri["alamatsantri"];?>" placeholder="alamatsantri">
          <input type="text" name="notelp" id="notelp" required value="<?= $alamatsantri["notelp"];?>" placeholder="notelp">
          <input type="text" name="namaayah" id="namaayah" required value="<?= $alamatsantri["namaayah"];?>" placeholder="namaayah">
          <input type="text" name="namaibu" id="namaibu" required value="<?= $alamatsantri["namaibu"];?>" placeholder="namaibu">

        </div>
        <div class="checkbox">
          <input type="checkbox" name="checkbox"><span>I agree to the <a href="">Privacy Poalicy</a></span>
        </div>
        <button type="submit" name="submit">Ubah Data Santri</button>
      </form>
    </div>
  </body>
</html>