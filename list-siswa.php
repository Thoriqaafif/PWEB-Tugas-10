<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .btn{
            margin:5px;
        }
    </style>
</head>

<body>
    <header class="d-flex justify-content-center">
        <h1>Data Pendaftar</h1>
    </header>

    <div class="d-block mx-5">
        <nav class="mx-5 d-flex justify-content-between">
            <nav class="mx-5 d-flex">
                <a href="index.php" class="text-danger mt-4 mx-5"><< Back</a>
            </nav>
            <div class="d-flex justify-content-end">
                <nav class="d-flex">
                    <a href="form-daftar.php" class="btn btn-primary mt-4 mx-5">[+] Tambah</a>
                </nav>
                <nav class="d-flex">
                    <a href="export-pdf.php" class="btn btn-danger mt-4 mx-5">[+] Export</a>
                </nav>
            </div>
        </nav>

        <br>
        <div class="d-flex justify-content-center">
            <table class="table table-strip">
            <thead>
                <tr class="text-center">
                    <th>Foto</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM siswa";
                $query = mysqli_query($db, $sql);

                while($siswa = mysqli_fetch_array($query)){
                    echo "<tr>";

                    echo "<td class='text-center col-md-1'><img src='./images/".$siswa['foto']."' width='100'></td>";
                    echo "<td class='text-center col-md-2'>".$siswa['nis']."</td>";
                    echo "<td class='text-center col-md-2'>".$siswa['nama']."</td>";
                    echo "<td class='text-center col-md-2'>".$siswa['jenis_kelamin']."</td>";
                    echo "<td class='text-center col-md-2'>".$siswa['telp']."</td>";
                    echo "<td class='text-center col-md-2'>".$siswa['alamat']."</td>";

                    echo "<td class='text-center col-md-2'>";
                    echo "<a href='form-edit.php?id=".$siswa['id']."' class='btn btn-sm btn-info mx-1'>Edit</a>";
                    echo "<a href='hapus.php?id=".$siswa['id']."' class='btn btn-sm btn-danger mx-1'>Hapus</a>";
                    echo "</td>";

                    echo "</tr>";
                }
                ?>

            </tbody>
            </table>
        </div>
        <p class="d-flex justify-content-center mt-4">Total: <?php echo mysqli_num_rows($query) ?> siswa</p>
        </div>
    </body>
</html>