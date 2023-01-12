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

 
    $query = "INSERT INTO siswa
        VALUES
('','$namasantri', '$alamatsantri','$notelp','$namaayah','$namaibu')
";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function upload() {


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

?>