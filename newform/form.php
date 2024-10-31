<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Mahasiswa Baru</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="form-container">
    <h1>Formulir Pendaftaran Mahasiswa Baru</h1>

    <?php

        // Cek apakah form telah disubmit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil data dari form
            $nama = htmlspecialchars($_POST['nama']);
            $tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
            $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);
            $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
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
            
            
            
            // Tampilkan data yang telah diinput
            echo "<h2>Terima Kasih, $nama!</h2>";
            echo "<p>Data berhasil diinput:</p>";
            echo "<ul>
                    <li>Nama: $nama</li>
                    <li>Jenis Kelamin: $jenis_kelamin</li>
                    <li>Tempat Lahir: $tempat_lahir</li>
                    <li>Tanggal Lahir: $tanggal_lahir</li>
                    <li>Alamat: $alamat</li>
                    <li>No Telepon: $telepon</li>
                    <li>Email : $email</li>
                    <li>Jurusan Yang Dipilih: $jurusan</li>

                    <li>Nama Orang Tua/Wali: $ortu</li>
                    <li>Nomor Orang Tua/Wali: $telp_ortu</li>
                    <li>Alamat Orang Tua/Wali: $alamat_ortu</li>
                    <li>Penghasilan Orang Tua/Wali: $penghasilan_ortu</li>
                    
                    <li>Asal Sekolah: $asal_sekolah</li>
                    <li>Tahun Lulus: $tahun_lulus</li>
                    
                  </ul>";

include 'db.php'; // Sertakan file koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = htmlspecialchars($_POST['nama']);
    $tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
    $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
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
            
            

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO tbl_form (nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, telepon, email, jurusan, ortu, telp_ortu, alamat_ortu, penghasilan_ortu, asal_sekolah, tahun_lulus) 
            VALUES ('$nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$telepon', '$email', '$jurusan',  '$ortu', '$telp_ortu', '$alamat_ortu', '$penghasilan_ortu', '$asal_sekolah', '$tahun_lulus')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Terima Kasih, $nama!</h2>";
        echo "<p>Data berhasil disimpan ke database.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close(); // Tutup koneksi

}


    } else { 
        //jika belum disubmbit,
    ?>
    <br>
    <a href= "log.php"> </a>
    <form action="" method="post"> <!-- Ubah action menjadi "" -->
        <fieldset>
            <legend class="section-title"><i class="fas fa-user"></i><b>Data Diri</legend></b>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Nama lengkap Anda" required>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="radio-group">
                    <label>
            <input type="radio" name="jenis_kelamin" value="Pria" required/>
            <span>Pria</span>
            </label>
            <label>
            <input type="radio" name="jenis_kelamin" value="Wanita" required/>
            <span>Wanita</span>
            </label>         
                </div>
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat lahir Anda" required>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="colored-input" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" placeholder="Alamat lengkap Anda" rows="2" required></textarea>
            </div>

            <div class="form-group">
                <label for="telepon">Nomor Telepon</label>
                <input type="tel" id="telepon" name="telepon" placeholder="Nomor telepon aktif" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email aktif Anda" required>
            </div>

            <div class="form-group">
                <label for="jurusan">Pilih Jurusan</label>
                <select id="jurusan" name="jurusan" required>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                </select>
            </div>
        </fieldset>

        <fieldset>
            <legend class="section-title"><i class="fas fa-users"></i><b>Data Orang Tua/Wali</legend></b>
            <div class="form-group">
                <label for="ortu">Nama Orang Tua/Wali</label>
                <input type="text" id="ortu" name="ortu" placeholder="Nama orang tua atau wali" required>
            </div>

            <div class="form-group">
                <label for="telp_ortu">Nomor Telepon Orang Tua</label>
                <input type="tel" id="telp_ortu" name="telp_ortu" placeholder="Nomor telepon orang tua" required>
            </div>

            <div class="form-group">
                <label for="alamat_ortu">Alamat Orang Tua</label>
                <textarea id="alamat_ortu" name="alamat_ortu" rows="2" placeholder="Alamat orang tua" required></textarea>
            </div>

            <div class="form-group">
                <label for="penghasilan_ortu">Penghasilan Orang Tua/Wali perbulan</label>
                <select id="penghasilan_ortu" name="penghasilan_ortu" required>
                    <option value="1-5 juta">1 - 5 juta</option>
                    <option value="5-10 juta">5 - 10 juta</option>
                    <option value="10-20 juta">10 - 20 juta</option>
                    <option value=">20 juta">Lebih dari 20 juta</option>
                </select>
            </div>
        </fieldset>

        <fieldset>
            <legend class="section-title"><i class="fas fa-school"></i> <b>Data Sekolah</legend></b>
            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah</label>
                <input type="text" id="asal_sekolah" name="asal_sekolah" placeholder="Asal sekolah Anda" required>
            </div>

            <div class="form-group">
                <label for="tahun_lulus">Tahun Lulus</label>
                <input type="number" id="tahun_lulus" name="tahun_lulus" min="2000" max="2024" placeholder="Tahun lulus" required>
            </div>
           
        </fieldset>

        <button type="submit">Daftar</button>
    </form>
    <?php

    }
    ?>

    

    </div>
    <script src="script.js"></script>
</body>
</html>