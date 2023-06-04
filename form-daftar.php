<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .form-box{
            border:solid 1px;
            border-radius: 5px;
            display: inline-block;
            padding:20px;
            background-color: white;
        }
    </style>

</head>

<body>
    <div class="d-flex flex-column vw-100 align-items-center justify-content-center bg-secondary" style="padding:30px 0px">
        <div class="form-box">
            <header class="d-flex justify-content-center">
                <h1 style="color:#3c486b">Formulir Pendaftaran Siswa Baru</h1>
            </header>

            <div class="d-flex justify-content-center mt-4">
                <form action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data">

                    <fieldset>

                    <p>
                        <label for="nis" class="d-block">NIS: </label>
                        <input type="text" name="nis" maxlength="50" class="my-2" size="50" placeholder="NIS"/>
                    </p>
                    <p>
                        <label for="nama" class="d-block">Nama: </label>
                        <input type="text" name="nama" maxlength="50" class="my-2" size="50" placeholder="Nama lengkap..."/>
                    </p>
                    <p>
                        <label for="jenis_kelamin" class="d-block">Jenis Kelamin: </label>
                        <label class="mx-2"><input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki</label>
                        <label class="mx-2"><input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan</label>
                    </p>
                    <p>
                        <label for="telp" class="d-block">Nomor Telepon: </label>
                        <input type="text" name="telp" maxlength="50" class="my-2" size="50" placeholder="Nomor telepon...">
                    </p>
                    <p>
                        <label for="alamat" class="d-block">Alamat: </label>
                        <textarea name="alamat" id="alamat" cols="53" rows="4" class="my-2"></textarea>
                    </p>
                    <p>
                        <label for="foto" class="d-block">Foto: </label>
                        <input type="file" name="foto"/>
                    </p>
                    <p>
                        <input type="submit" value="Daftar" name="daftar" class="btn btn-primary"/>
                    </p>

                    </fieldset>

                </form>
            </div>
        </div>
    </div>

</body>
</html>