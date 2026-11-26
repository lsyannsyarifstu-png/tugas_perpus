<?php
require_once "koneksi.php";

$sql = "SELECT * from anggota" ;

$hasil = mysqli_query($koneksi, $sql);
$jumlah= mysqli_num_rows($hasil);
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td, th {
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            border: 1px solid #160404;
            padding: 5px;
            margin: 10px;
        }
    
    </style>
</head>
<body>
    <h1>Data Anggota</h1>
    <a href="form_anggota.php">Tambah Data</a>
    <table>
        <tr>
            <th>No</th>
            <th>Nomor anggota</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor HP</th>
            <th>Jenis Anggota</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; while ($data = mysqli_fetch_assoc($hasil)) {?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($data["no_anggota"]); ?></td>
            <td><?php echo htmlspecialchars($data["nama_lengkap"]); ?></td>
            <td><?php echo htmlspecialchars($data["email"]); ?></td>
            <td><?php echo htmlspecialchars($data["no_hp"]); ?></td>
            <td><?php echo htmlspecialchars($data["jenis_anggota"]); ?></td>
            <td><?php echo htmlspecialchars($data["alamat"]); ?></td>

            <td>
                <a href="edit_anggota.php?id=<?php echo (int) $data["id"]; ?>">Edit</a>

                <form action="hapus_anggota.php" method="post" style="display:inline;" onsubmit= "return confirm('yakin ingin menghapus data ini?');">
                    <input type="hidden" name="id" value="<?php echo (int) $data["id"];?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
    <?php mysqli_free_result($hasil); ?>
</body>
</html>