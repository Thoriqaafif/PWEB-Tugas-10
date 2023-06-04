<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jk = $_POST['jenis_kelamin'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    // add photo name with uploaded date
    $fotobaru = date('dmYHis').$foto;

    // set folder path
    $path = "images/".$fotobaru;

    // process upload if picture have been uploaded successfully
    if(move_uploaded_file($tmp, $path)){
        // buat query
        $sql = "INSERT INTO siswa (nis,nama,jenis_kelamin,telp,alamat,foto) VALUE ('$nis','$nama','$jk','$telp','$alamat','$fotobaru')";
        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: index.php?status=sukses');
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            unlink($path);
            header('Location: index.php?status=gagal');
        }
    }else{
        // Jika gambar gagal diupload, Lakukan :
        echo "Maaf, Gambar gagal untuk diupload.";
        echo "<br><a href='form-daftar.php'>Kembali Ke Form</a>";
    }


} else {
    die("Akses dilarang...");
}

?>