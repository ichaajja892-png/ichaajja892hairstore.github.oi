<?php
include "koneksi.php";

$idmapel = $_GET['idmapel'];

mysqli_query($koneksi, "DELETE FROM mata_pelajaran
                        WHERE idmapel='$idmapel'");

header("Location: mapel.php");
?>