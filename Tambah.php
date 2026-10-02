<?php
include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data siswa tidak ditemukan!");
}

if (isset($_POST['update'])) {
    $nis     = $_POST['nis'];
    $nama    = $_POST['nama'];
    $kelas   = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $query = mysqli_query($koneksi, "UPDATE siswa SET
        nis='$nis',
        nama='$nama',
        kelas='$kelas',
        jurusan='$jurusan'
        WHERE id='$id'
    ");

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Siswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f3ff;
            margin: 0;
            padding: 40px;
        }

        .container {
            width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        h2 {
            color: #211a35;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        button {
            margin-top: 20px;
            padding: 12px 20px;
            background: #7c5cff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        a {
            margin-left: 10px;
            text-decoration: none;
            color: #777;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Edit Data Siswa</h2>

    <form method="POST">

        <label>NIS</label>
        <input type="text" name="nis"
               value="<?= htmlspecialchars($data['nis']); ?>" required>

        <label>Nama</label>
        <input type="text" name="nama"
               value="<?= htmlspecialchars($data['nama']); ?>" required>

        <label>Kelas</label>
        <input type="text" name="kelas"
               value="<?= htmlspecialchars($data['kelas']); ?>" required>

        <label>Jurusan</label>
        <input type="text" name="jurusan"
               value="<?= htmlspecialchars($data['jurusan']); ?>" required>

        <button type="submit" name="update">
            Simpan Perubahan
        </button>

        <a href="index.php">Kembali</a>

    </form>

</div>

</body>
</html>