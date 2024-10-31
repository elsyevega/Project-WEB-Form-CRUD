<?php
include 'db.php'; // Koneksi ke database

$sql = "SELECT * FROM tbl_form";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa Terdaftar</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Jurusan</th>
            
            <th>Nama Orang Tua</th>
            <th>No Telepon Orang Tua</th>
            <th>Alamat Orang Tua</th>
            <th>Penghasilan Orang Tua</th>

            <th>Asal Sekolah</th>
            <th>Tahun Lulus</th>
            
            <th>Aksi</th>
        </tr>
        <?php if ($result->num_rows > 0) { 
            $no = 1;
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['jenis_kelamin']; ?></td>
                    <td><?= $row['tempat_lahir']; ?></td>
                    <td><?= $row['tanggal_lahir']; ?></td>
                    <td><?= $row['alamat']; ?></td>
                    <td><?= $row['telepon']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['jurusan']; ?></td>
                    <td><?= $row['ortu']; ?></td>
                    <td><?= $row['telp_ortu']; ?></td>
                    <td><?= $row['alamat_ortu']; ?></td>
                    <td><?= $row['penghasilan_ortu']; ?></td>
                    <td><?= $row['asal_sekolah']; ?></td>
                    <td><?= $row['tahun_lulus']; ?></td>
                    
                    <td>
                        <a href="edit.php?id=<?= $row['id_form']; ?>">Edit</a> | 
                        <a href="delete.php?id=<?= $row['id_form']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
        <?php } } else { ?>
            <tr>
                <td colspan="6">Tidak ada data.</td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
