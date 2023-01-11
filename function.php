<?php
$conn = mysqli_connect("localhost","root","","phplatihan"); 
function query ($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}
function tambah ($data) {
    global $conn;
    $namasantri = htmlspecialchars($data["namasantri"]);
    $alamatsantri =  htmlspecialchars($data["alamatsantri"]);
    $notelp =  htmlspecialchars($data["notelp"]);
    $namaayah =  htmlspecialchars($data["namaayah"]);
    $namaibu =  htmlspecialchars($data["namaibu"]);

    $gambar = upload();
    if ( !$namaibu ) {
        return false;
    }
    $query = "INSERT INTO siswa
        VALUES
('','$namasantri', '$alamatsantri','$notelp','$namaayah','$namaibu')
";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
             alert('Pilih gambar terlebih dahulu!!');
        </script>";
        return false;
    }
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
   if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
//     echo "<script>
//     alert('Yang Anda Upload Bukan Gambar!!');
// </script>";
return false;
   }
if( $ukuranFile > 1000000){
    echo "<script>
    alert('Ukuran Gambar Terlalu Besar!!');
</script>";
return false;
}
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;

move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
return $namaFileBaru;

}

function hapus ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function ubah ($data){
    global $conn;
    $id = $data["id"];
    $namasantri = htmlspecialchars($data["namasantri"]);
    $alamatsantri =  htmlspecialchars($data["alamatsantri"]);
    $notelp =  htmlspecialchars($data["notelp"]);
    $namaayah =  htmlspecialchars($data["namaayah"]);
    $namaibu = htmlspecialchars($data["namaibu"]);

    
    $query = "UPDATE siswa SET
    namasantri = '$namasantri',
    alamatsantri = '$alamatsantri',
    notelp = '$notelp',
    namaayah = '$namaayah',
    namaibu = '$namaibu'
    WHERE id = $id
    
    ";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}
function cari($keyword) {
    $query = "SELECT * FROM siswa 
    WHERE
    namasantri LIKE '%$keyword%' OR 
    alamatsantri LIKE '%$keyword%' OR 
    namaayah LIKE '%$keyword%' OR
    namaibu LIKE '%$keyword%'
    ";
    return query($query);
}
// function registrasi($data){
//     global $conn;
//     $username = strtolower(stripslashes($data["username"]));
//     $password = mysqli_real_escape_string($conn,$data["password"]);
//     $password2 = mysqli_real_escape_string($conn,$data["password2"]);
//     $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
//     if(mysqli_fetch_assoc($result)) {
//         echo "
//         <script>
//         alert('Username Sudah Terdaftar!!')
//         </script> ";
//         return false;
//     }

//     if ($password !== $password2) {
//         echo "<script>
//         alert('Password Tidak Sama!!');
//         </script>";
//         return false;
//     } 
// $password = password_hash($password, PASSWORD_DEFAULT);
// mysqli_query($conn, "INSERT INTO user VALUES('', '$username','$password')");
// return mysqli_affected_rows($conn);
// }
?>