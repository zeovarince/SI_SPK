<?php
session_start();
if($_SESSION['status'] != "login"){ header("location:login.php"); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kriteria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 500px;">
        <div class="card shadow">
            <div class="card-header bg-success text-white">Tambah Kriteria Baru</div>
            <div class="card-body">
                <form action="proses_kriteria.php?aksi=tambah" method="POST">
                    <div class="mb-3">
                        <label>Kode Kriteria (Unik)</label>
                        <input type="text" name="kode" class="form-control" placeholder="Contoh: C6" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama Kriteria</label>
                        <input type="text" name="nama" class="form-control" placeholder="Contoh: Kualitas Air" required>
                    </div>
                    <div class="mb-3">
                        <label>Sifat</label>
                        <select name="sifat" class="form-select">
                            <option value="Benefit">Benefit (Keuntungan)</option>
                            <option value="Cost">Cost (Biaya)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Bobot (Desimal 0-1)</label>
                        <input type="number" step="0.01" name="bobot" class="form-control" placeholder="Contoh: 0.1" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Simpan</button>
                    <a href="data_kriteria.php" class="btn btn-light w-100 mt-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>