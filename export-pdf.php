<?php
// memanggil library FPDF
require('fpdf.php');

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');

// membuat halaman baru
$pdf->AddPage();

// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);

// mencetak string 
$pdf->Cell(190,7,'Data Pendaftar PPDB Jawa Timur 2023',0,1,'C');
// $pdf->SetFont('Arial','B',12);
// $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,10,'Foto',1,0,'C');
$pdf->Cell(20,10,'NIS',1,0,'C');
$pdf->Cell(20,10,'Nama',1,0,'C');
$pdf->Cell(30,10,'Jenis Kelamin',1,0,'C');
$pdf->Cell(30,10,'Nomor Telepon',1,0,'C');
$pdf->Cell(45,10,'Alamat',1,1,'C');

$pdf->SetFont('Arial','',10);

include 'config.php';
$mahasiswa = mysqli_query($db, "select * from siswa");
while ($row = mysqli_fetch_array($mahasiswa)){
    $imagePath = 'images/'.$row['foto'];
    if(file_exists($imagePath)){
        list($width, $height) = getimagesize($imagePath);

        $aspectRatio = $width / $height;
        
        $maxHeight = 30;
        $maxWidth = 30*$aspectRatio;

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $pdf->Cell(40, 40, '', 1, 0, 'C');
        $pdf->Image($imagePath, $x+5, $y+5, 30, 30);

        $pdf->SetXY($x + 40, $y);
    }
    else{
        $pdf->Cell(50, 50, 'Tidak Ada Gambar', 1, 0, 'C');
    }

    $pdf->Cell(20,40,$row['nis'],1,0,'C');
    $pdf->Cell(20,40,$row['nama'],1,0,'C');
    $pdf->Cell(30,40,$row['jenis_kelamin'],1,0,'C');
    $pdf->Cell(30,40,$row['telp'],1,0,'C');	
    $pdf->Cell(45,40,$row['alamat'],1,1,'C'); 
}

$pdf->Output();
?>