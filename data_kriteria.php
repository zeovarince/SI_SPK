<?php
session_start();
include 'koneksi.php';
if($_SESSION['status'] != "login"){ header("location:login.php"); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Kriteria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">SPK Garam</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="index.php">Dashboard</a>
                <a class="nav-link active" href="data_kriteria.php">Kriteria</a>
                <a class="nav-link" href="data_petani.php">Petani (Alternatif)</a>
                <a class="nav-link" href="hasil.php">Hasil</a>
                <a class="nav-link btn btn-danger btn-sm text-white ms-3" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold"><i class="bi bi-list-task"></i> Data Kriteria & Bobot</h5>
                <a href="tambah_kriteria.php" class="btn btn-success btn-sm"><i class="bi bi-plus-lg"></i> Tambah Kriteria</a>
            </div>
            <div class="card-body">
                
                <?php if(isset($_GET['pesan'])): ?>
                    <div class="alert alert-info alert-dismissible fade show">
                        Berhasil memperbarui data!
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Kriteria</th>
                            <th>Sifat</th>
                            <th>Bobot</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Urutkan berdasarkan Kode biar rapi
                        $data = mysqli_query($koneksi, "SELECT * FROM tb_kriteria ORDER BY kode ASC");
                        $total_bobot = 0;
                        while($d = mysqli_fetch_array($data)){
                            $total_bobot += $d['bobot'];
                        ?>
                        <tr>
                            <td class="fw-bold"><?php echo $d['kode']; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td>
                                <span class="badge <?php echo ($d['sifat']=='Benefit')?'bg-success':'bg-danger'; ?>">
                                    <?php echo $d['sifat']; ?>
                                </span>
                            </td>
                            <td><?php echo $d['bobot']; ?></td>
                            <td>
                                <a href="edit_kriteria.php?id=<?php echo $d['kode']; ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                <a href="proses_kriteria.php?aksi=hapus&id=<?php echo $d['kode']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus kriteria ini?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr class="fw-bold bg-light">
                            <td colspan="3" class="text-end">Total Bobot (Harus 1.0)</td>
                            <td class="<?php echo ($total_bobot != 1) ? 'text-danger' : 'text-success'; ?>">
                                <?php echo $total_bobot; ?>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                
                <?php if($total_bobot != 1): ?>
                <div class="alert alert-danger mt-2">
                    <i class="bi bi-exclamation-triangle"></i> <b>Peringatan:</b> Total bobot saat ini <b><?php echo $total_bobot; ?></b>. Mohon sesuaikan agar totalnya pas <b>1.0</b> agar perhitungan SMART valid.
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>