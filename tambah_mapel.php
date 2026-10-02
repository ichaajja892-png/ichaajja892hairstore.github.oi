<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {

    $idmapel = $_POST['idmapel'];
    $namamapel = $_POST['namamapel'];

    mysqli_query($koneksi, "INSERT INTO mata_pelajaran (idmapel, namamapel)
                            VALUES ('$idmapel', '$namamapel')");

    header("Location: mapel.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mata Pelajaran</title>
</head>

<body>

    <h2>Tambah Mata Pelajaran</h2>

    <form method="post">

        ID Mapel <br>
        <input type="text" name="idmapel" maxlength="10" required>

        <br><br>

        Nama Mata Pelajaran <br>
        <input type="text" name="namamapel" maxlength="20" required>

        <br><br>

        <button type="submit" name="simpan">Simpan</button>

        <a href="mapel.php">Kembali</a>

    </form>

</body>
</html>