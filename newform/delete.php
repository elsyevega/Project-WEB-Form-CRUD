<?php
include 'db.php'; // Koneksi ke database

// Ambil ID dari URL dan pastikan hanya angka
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Cek apakah ID valid
if ($id > 0) {
    // Siapkan query menggunakan prepared statement
    $stmt = $conn->prepare("DELETE FROM tbl_form WHERE id_form = ?");
    $stmt->bind_param("i", $id);

    // Eksekusi query dan cek hasilnya
    if ($stmt->execute()) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID tidak valid.";
}

// Redirect ke halaman daftar
header("Location: list.php");
exit();
?>
