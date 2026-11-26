<?php
require_once "koneksi.php";
$id = $_GET['id'];
 $query = "SELECT * FROM anggota WHERE id = ?";

 $stmt = mysqli_prepare($koneksi, $query );

 mysqli_stmt_bind_param($stmt, "i", $id);

 mysqli_stmt_execute($stmt);

 $result = mysqli_stmt_get_result($stmt);

 $data = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Edit Anggota</title>
        <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #1f3864; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input[type="text"], select, textarea { width: 320px; padding: 6px; }
        button { margin-top: 16px; padding: 8px 20px; }
        .sukses { background: #e6f4ea; border-left: 5px solid #2e7d32;
          padding: 10px; width: 320px; }
</style>
    </head>
    <body>
        <h1>Edit Data Anggota</h1>
        <form action= "proses_update.php" method="POST">
            <input type= "hidden" name= "id"
            value= "<?= $data['id']; ?>">

            <label for="no_anggota">Nomor Anggota</label>
            <input type="text" id="no_anggota" name="no_anggota"    
            value= "<?= htmlspecialchars($data['no_anggota']); ?>"
            maxlength="20" required>

            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap"
            value= "<?= htmlspecialchars($data['nama_lengkap']); ?>"
            maxlength="100" required>
            <br><br>

            <label for="email">Email</label>
            <input type="text" id="email" name="email"
            value= "<?= htmlspecialchars($data['email']); ?>"
            maxlength="100" required>
            <br><br>

            <label for="no_hp">Nomor HP</label>
            <input type="text" id="no_hp" name="no_hp"
            value= "<?= htmlspecialchars($data['no_hp']); ?>"
            maxlength="15" required>
            <br><br>

            <label for="jenis_anggota">Jenis Anggota</label>
            <select id="jenis_anggota" name="jenis_anggota">

            <option value="Mahasiswa" <?= $data['jenis_anggota']== "Mahasiswa" ? "selected" : "" ?>>Mahasiswa</option>
            <option value="Dosen" <?= $data['jenis_anggota']== "Dosen" ? "selected" : "" ?>>Dosen</option>
            <option value="Tenaga Kependidikan" <?= $data['jenis_anggota']== "Tenaga Kependidikan" ? "selected" : "" ?>>Tenaga Kependidikan</option>
            </select>
            <br><br>

            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" rows="4"><?= htmlspecialchars($data['alamat']); ?></textarea>
            <br><br>
            <button type="submit">Simpan</button>
            
        </form>

    </body>