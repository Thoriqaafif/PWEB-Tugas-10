<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="home.css" rel="stylesheet">
    
</head>

<body>
    <header class="d-flex flex-column vw-100 vh-100 align-items-center justify-content-center bg-secondary">
        <div class="home-head">
            <h3 class="home-head-content">Selamat Datang di</h3>
            <h1 class="home-head-content">PPDB Jawa Timur</h1>
        </div>
        <div class="d-flex justify-content-center">
            <a type="button" class="btn btn-success" href="form-daftar.php">Daftar Baru</a>
            <a type="button" class="btn btn-success" href="list-siswa.php">Data Pendaftar</a>
        </div>
        <?php if(isset($_GET['status'])): ?>
        <p class="d-flex justify-content-center text-warning">
            <?php
                if($_GET['status'] == 'sukses'){
                    echo "Pendaftaran siswa baru berhasil!";
                } else {
                    echo "Pendaftaran gagal!";
                }
            ?>
        </p>
        <?php endif; ?>
    </header>

    </body>
</html>