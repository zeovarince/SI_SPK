<?php
include 'koneksi.php';

$aksi = $_GET['aksi'];

// 1. TAMBAH KRITERIA
if($aksi == "tambah"){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $sifat = $_POST['sifat'];
    $bobot = $_POST['bobot'];

    // Cek apakah kode sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM tb_kriteria WHERE kode='$kode'");
    if(mysqli_num_rows($cek) > 0){
        echo "<script>alert('Gagal! Kode Kriteria sudah ada.'); window.location='tambah_kriteria.php';</script>";
    } else {
        mysqli_query($koneksi, "INSERT INTO tb_kriteria VALUES('$kode', '$nama', '$sifat', '$bobot')");
        header("location:data_kriteria.php?pesan=sukses");
    }

// 2. EDIT KRITERIA
} elseif($aksi == "edit"){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $sifat = $_POST['sifat'];
    $bobot = $_POST['bobot'];

    mysqli_query($koneksi, "UPDATE tb_kriteria SET nama='$nama', sifat='$sifat', bobot='$bobot' WHERE kode='$kode'");
    header("location:data_kriteria.php?pesan=sukses");

// 3. HAPUS KRITERIA
} elseif($aksi == "hapus"){
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM tb_kriteria WHERE kode='$id'");
    header("location:data_kriteria.php?pesan=sukses");
}
?>