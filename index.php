<?php


require 'function.php';
$siswa = query("SELECT * FROM siswa ORDER BY id ASC");
if(isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>PHP Tugas</title>
</head>

<body style="
  font-family: Lucida Console, Courier New, monospace; background: rgb(80,80,80);
background: radial-gradient(circle, rgba(80,80,80,1) 0%, rgba(184,184,184,1) 100%);;;
">  <br><br><br>
    <div class="container" 
    style="background: rgb(50,50,50);
background: linear-gradient(90deg, rgba(50,50,50,1) 0%, rgba(184,184,184,1) 36%, rgba(184,184,184,1) 64%, rgba(50,50,50,1) 100%); border-radius:20px;"
    >
  <a href="logout.php" class="btn btn-danger" style="margin-bottom: -600px; margin-left:100px;">Logout
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
  </svg></a>
        <h1 class="text-center" style="padding:50px;">Daftar Santri</h1>
        
            <a href="tambah.php" class="btn btn-primary " style="margin-left: 50px;margin-bottom:-110px;">Tambah Data Santri</a>
            <br><br>
            <form class="d-flex col-md-6 offset-md-3 mb-5" action="" method="post">
                <input type="text" name="keyword" autofocus placeholder="Masukkan Pencarian..." autocomplete="off" class="form-control me-5">
                <button type="submit" name="cari" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg></button>
            </form>
            <div class="cont" style="padding:50px ;">
                <div class="row">
                    <div class="col-md">
                        <table border="1" cellpadding="10" cellspacing="0" class="table table-dark table-striped" >
                            <tr>
                                <td>ID</td>
                                <td>Aksi</td>
                                <td>Nama</td>
                                <td>Alamat</td>
                                <td>No.Telp</td>
                                <td>Nama Ayah</td>
                                <td>Nama ibu</td>
                                <?php $i = 1; ?>
                                <?php foreach ($siswa as $row) : ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>
                                    <a class="btn btn-primary " href="ubah.php?id=<?php echo $row["id"] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg></a>
                                    <a class="btn btn-danger" href="hapus.php?id=<?php echo $row["id"] ?>" onclick="return confirm ('Yakin Dek?');"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                    </svg></a>
                                </td>
                                <td><?php echo $row["namasantri"] ?></td>
                                <td><?php echo $row["alamatsantri"] ?></td>
                                <td><?php echo $row["notelp"] ?></td>
                                <td><?php echo $row["namaayah"] ?></td>
                                <td><?php echo $row["namaibu"] ?></td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    <br><br><br>
    
    
</body>

</html>