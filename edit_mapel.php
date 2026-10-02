<?php
include "koneksi.php";

$idmapel = $_GET['idmapel'];

$query = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran WHERE idmapel='$idmapel'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {

    $namamapel = $_POST['namamapel'];

    mysqli_query($koneksi, "UPDATE mata_pelajaran SET
        namamapel='$namamapel'
        WHERE idmapel='$idmapel'
    ");

    header("Location: mapel.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <title>Edit Mata Pelajaran</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            color: #252536;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 230px;
            height: 100vh;
            background: #171827;
            padding: 30px 20px;
        }

        .logo {
            color: white;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .logo span {
            color: #9b6cff;
        }

        .menu {
            display: block;
            text-decoration: none;
            color: #a8a8b8;
            padding: 13px 15px;
            margin-bottom: 8px;
            border-radius: 10px;
        }

        .menu:hover,
        .menu.active {
            background: #29283e;
            color: white;
        }

        .menu.active {
            border-left: 4px solid #9b6cff;
        }

        .content {
            margin-left: 230px;
            padding: 40px;
        }

        .card {
            max-width: 700px;
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.05);
        }

        h1 {
            margin-top: 0;
        }

        .subtitle {
            color: #888899;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddddea;
            border-radius: 9px;
            font-size: 14px;
            outline: none;
        }

        input:focus {
            border-color: #7657e8;
        }

        .buttons {
            margin-top: 25px;
        }

        button {
            border: none;
            background: linear-gradient(135deg, #7657e8, #a36cf0);
            color: white;
            padding: 12px 22px;
            border-radius: 9px;
            font-weight: bold;
            cursor: pointer;
        }

        .kembali {
            text-decoration: none;
            background: #eeeeF5;
            color: #555568;
            padding: 12px 22px;
            border-radius: 9px;
            font-weight: bold;
            margin-left: 8px;
        }
    </style>

</head>

<body>

<div class="sidebar">

    <div class="logo">
        Data<span>Pelajar</span>
    </div>

    <a href="index.php" class="menu">
        👤 &nbsp; Data Siswa
    </a>

    <a href="mapel.php" class="menu active">
        📚 &nbsp; Mata Pelajaran
    </a>

</div>


<div class="content">

    <div class="card">

        <h1>Edit Mata Pelajaran</h1>

        <p class="subtitle">
            Perbarui data mata pelajaran.
        </p>

        <form method="post">

            <label>ID Mata Pelajaran</label>

            <input
                type="text"
                value="<?= htmlspecialchars($data['idmapel']); ?>"
                disabled
            >

            <br><br>

            <label>Nama Mata Pelajaran</label>

            <input
                type="text"
                name="namamapel"
                value="<?= htmlspecialchars($data['namamapel']); ?>"
                required
            >

            <div class="buttons">

                <button type="submit" name="update">
                    Simpan Perubahan
                </button>

                <a href="mapel.php" class="kembali">
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>