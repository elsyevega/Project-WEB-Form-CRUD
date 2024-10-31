<?php
session_start();  // Memulai session
session_destroy();  // Hapus semua data session
header("Location: log.php");  // Arahkan ke halaman login
exit();
?>
