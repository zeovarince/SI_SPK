<?php
include 'koneksi.php';

$aksi = $_GET['aksi'];

// --- TAMBAH DATA ---
if($aksi == "tambah"){
    $nama = $_POST['nama']; // Inputan Nama
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $c3 = $_POST['c3'];
    $c4 = $_POST['c4'];
    $c5 = $_POST['c5'];

    // 1. Masukkan dulu identitas ke tb_petani
    $query_petani = mysqli_query($koneksi, "INSERT INTO tb_petani (nama_petani) VALUES ('$nama')");
    
    if($query_petani){
        // 2. Ambil ID petani yang baru saja dibuat
        $id_petani_baru = mysqli_insert_id($koneksi);

        // 3. Masukkan nilai C1-C5 ke tabel alternatif dengan id_petani tadi
        mysqli_query($koneksi, "INSERT INTO alternatif (id_petani, c1, c2, c3, c4, c5) 
                                VALUES ('$id_petani_baru', '$c1', '$c2', '$c3', '$c4', '$c5')");
        
        header("location:data_petani.php?pesan=tambah_sukses");
    } else {
        echo "Gagal menyimpan data petani.";
    }

// --- EDIT DATA ---
} elseif($aksi == "edit"){
    $id_petani = $_POST['id']; // Ini kita set sebagai id_petani
    $nama = $_POST['nama'];
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $c3 = $_POST['c3'];
    $c4 = $_POST['c4'];
    $c5 = $_POST['c5'];

    // Update Nama di tb_petani
    mysqli_query($koneksi, "UPDATE tb_petani SET nama_petani='$nama' WHERE id_petani='$id_petani'");

    // Update Nilai di tabel alternatif
    mysqli_query($koneksi, "UPDATE alternatif SET c1='$c1', c2='$c2', c3='$c3', c4='$c4', c5='$c5' WHERE id_petani='$id_petani'");
    
    header("location:data_petani.php?pesan=edit_sukses");

// --- HAPUS DATA (REVISI) ---
} elseif($aksi == "hapus"){
    $id = $_GET['id'];
    
    // Cukup hapus di tb_petani, data di alternatif otomatis hilang karena ON DELETE CASCADE
    mysqli_query($koneksi, "DELETE FROM tb_petani WHERE id_petani='$id'");
    
    header("location:data_petani.php?pesan=hapus_sukses");
}
?>