<?php

include("config.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // hapus foto
    $sql = "SELECT foto FROM siswa WHERE id=$id";
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_array($query);

    if(is_file("images/".$data['foto'])){
        unlink("images/".$data['foto']);
    }

    // buat query hapus
    $sql = "DELETE FROM siswa WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: list-siswa.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>