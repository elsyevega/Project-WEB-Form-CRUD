<?php
include 'db.php'; // Koneksi ke database

// Ambil ID dari URL dan pastikan hanya angka
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Ambil data mahasiswa berdasarkan id_form
$sql = "SELECT * FROM tbl_form WHERE id_form = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();

// Jika data tidak ditemukan
if (!$data) {
    echo "Data tidak ditemukan!";
    exit();
}

// Update data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
    $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $email = htmlspecialchars($_POST['email']);
    $jurusan = htmlspecialchars($_POST['jurusan']);
    $ortu = htmlspecialchars($_POST['ortu']);
    $telp_ortu = htmlspecialchars($_POST['telp_ortu']);
    $alamat_ortu = htmlspecialchars($_POST['alamat_ortu']);
    $penghasilan_ortu = htmlspecialchars($_POST['penghasilan_ortu']);
    $asal_sekolah = htmlspecialchars($_POST['asal_sekolah']);
    $tahun_lulus = htmlspecialchars($_POST['tahun_lulus']);
    

    // Query update menggunakan prepared statement
    $update = "UPDATE tbl_form SET 
        nama = ?, jenis_kelamin = ?, tempat_lahir = ?, tanggal_lahir = ?, alamat = ?, telepon = ?, 
        email = ?, jurusan = ?, ortu = ?, telp_ortu = ?, alamat_ortu = ?, 
        penghasilan_ortu = ?, asal_sekolah = ?, tahun_lulus = ?
        WHERE id_form = ?";

    // Debugging values before binding
var_dump($nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, 
         $alamat, $telepon, $email, $jurusan, 
         $ortu, $telp_ortu, $alamat_ortu, 
         $penghasilan_ortu, $asal_sekolah, $tahun_lulus, $dokumen, $id);

$stmt = $conn->prepare($update);
$stmt->bind_param(
    "ssssssssssssssi", 
    $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, 
    $alamat, $telepon, $email, $jurusan, 
    $ortu, $telp_ortu, $alamat_ortu, 
    $penghasilan_ortu, $asal_sekolah, $tahun_lulus,
    $id
);
     
   

    if ($stmt->execute()) {
        header("Location: list.php"); // Redirect jika berhasil
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    <form method="post">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required><br>
        <br>
        <label>Jenis Kelamin:</label>
        <input type="text" name="jenis_kelamin" value="<?= htmlspecialchars($data['jenis_kelamin']); ?>" required><br>
        <br>
        <label>Tempat Lahir:</label>
        <input type="text" name="tempat_lahir" value="<?= htmlspecialchars($data['tempat_lahir']); ?>" required><br>
        <br>
        <label>Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" value="<?= htmlspecialchars($data['tanggal_lahir']); ?>" required><br>
        <br>
        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?= htmlspecialchars($data['alamat']); ?>" required><br>
        <br>
        <label>Telepon:</label>
        <input type="text" name="telepon" value="<?= htmlspecialchars($data['telepon']); ?>" required><br>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($data['email']); ?>" required><br>
        <br>
        <label>Jurusan:</label>
        <input type="text" name="jurusan" value="<?= htmlspecialchars($data['jurusan']); ?>" required><br>
        <br>
        <label>Nama Orang Tua:</label>
        <input type="text" name="ortu" value="<?= htmlspecialchars($data['ortu']); ?>" required><br>
        <br>
        <label>No Telepon Orang Tua:</label>
        <input type="text" name="telp_ortu" value="<?= htmlspecialchars($data['telp_ortu']); ?>" required><br>
        <br>
        <label>Alamat Orang Tua:</label>
        <input type="text" name="alamat_ortu" value="<?= htmlspecialchars($data['alamat_ortu']); ?>" required><br>
        <br>
        <label>Penghasilan Orang Tua:</label>
        <input type="text" name="penghasilan_ortu" value="<?= htmlspecialchars($data['penghasilan_ortu']); ?>" required><br>
        <br>
        <label>Asal Sekolah:</label>
        <input type="text" name="asal_sekolah" value="<?= htmlspecialchars($data['asal_sekolah']); ?>" required><br>
        <br>
        <label>Tahun Lulus:</label>
        <input type="text" name="tahun_lulus" value="<?= htmlspecialchars($data['tahun_lulus']); ?>" required><br>
        <br>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>
