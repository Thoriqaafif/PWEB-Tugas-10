<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['Ubah'])){
    $id=$_GET['id'];

    // ambil data dari formulir
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jk = $_POST['jenis_kelamin'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    //cek apakah user mengubah foto
    if(empty($foto)){   // user tidak memilih foto
        $sql = "UPDATE siswa SET nis='$nis', nama='$nama', jenis_kelamin='$jk', telp='$telp', alamat='$alamat' WHERE id=$id";
        $query = mysqli_query($db, $sql);

        if( $query ) {
            // kalau berhasil alihkan ke halaman list-siswa.php
            header('Location: list-siswa.php');
        } else {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }
    }
    else{   // user mengubah foto
        $fotobaru = date('dmYHis').$foto;
        $path = "images/".$fotobaru;

        if(move_uploaded_file($tmp, $path)){
            $sql = "SELECT foto from siswa where id=$id";
            $query = mysqli_query($db, $sql);
            $data = mysqli_fetch_array($query);

            // hapus foto sebelumnya
            if(is_file("images/".$data['foto'])){
                unlink("images/".$data['foto']);
            }

            $sql = "UPDATE siswa SET nis='$nis', nama='$nama', jenis_kelamin='$jk', telp='$telp', alamat='$alamat', foto='$fotobaru' WHERE id=$id";
            $query = mysqli_query($db, $sql);
            if( $query ) {
                // kalau berhasil alihkan ke halaman list-siswa.php
                header('Location: list-siswa.php');
            } else {
                // kalau gagal tampilkan pesan
                unlink($path);
                die("Gagal menyimpan perubahan...");
            }
        }
    }


} else {
    die("Akses dilarang...");
}

?>