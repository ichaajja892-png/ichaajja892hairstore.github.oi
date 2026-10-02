<?php
include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE id='$id'");

if ($query) {
    header("Location: index.php");
    exit;
} else {
    echo "Data gagal dihapus: " . mysqli_error($koneksi);
}
?>