<?php
require_once "koneksi.php";

$id = $_POST['id'];


//membuat quer delete
$query ="DELETE FROM anggota WHERE id = ?";
//menyiapkan statement
$stmt = mysqli_prepare($koneksi, $query);
//mengikat parameter
mysqli_stmt_bind_param($stmt, "i", $id);

//menjalankan query delete
if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_close($stmt);
    header("Location: data_anggota.php");
    exit;
} else {
    die("Gagal menghapus data: " . mysqli_stmt_error($stmt));
}

?>