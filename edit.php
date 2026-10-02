<?php
include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data siswa tidak ditemukan!");
}

if (isset($_POST['update'])) {

    $nis     = $_POST['nis'];
    $nama    = $_POST['nama'];
    $kelas   = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $query = mysqli_query($koneksi, "UPDATE tbl_siswa SET
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
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            color: #252536;
        }

        .container {
            width: 600px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        }

        h1 {
            margin-top: 0;
            color: #252536;
        }

        p {
            color: #888899;
        }

        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 9px;
            box-sizing: border-box;
        }

        button {
            margin-top: 25px;
            padding: 12px 20px;
            border: none;
            border-radius: 9px;
            background: #7657e8;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.9;
        }

        .kembali {
            margin-left: 12px;
            text-decoration: none;
            color: #777;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Data Siswa</h1>
    <p>Ubah data siswa yang diperlukan.</p>

    <form method="POST">

        <label>NIS</label>
        <input type="text"
               name="nis"
               value="<?= htmlspecialchars($data['nis']); ?>"
               required>

        <label>Nama</label>
        <input type="text"
               name="nama"
               value="<?= htmlspecialchars($data['nama']); ?>"
               required>

        <label>Kelas</label>
        <input type="text"
               name="kelas"
               value="<?= htmlspecialchars($data['kelas']); ?>"
               required>

        <label>Jurusan</label>
        <input type="text"
               name="jurusan"
               value="<?= htmlspecialchars($data['jurusan']); ?>"
               required>

        <button type="submit" name="update">
            Simpan Perubahan
        </button>

        <a href="index.php" class="kembali">
            Kembali
        </a>

    </form>

</div>

</body>
</html>