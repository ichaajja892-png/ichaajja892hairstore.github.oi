<?php
include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran");
$total = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Pelajaran</title>

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

        /* SIDEBAR */
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
            transition: 0.2s;
        }

        .menu:hover,
        .menu.active {
            background: #29283e;
            color: white;
        }

        .menu.active {
            border-left: 4px solid #9b6cff;
        }

        /* CONTENT */
        .content {
            margin-left: 230px;
            padding: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 30px;
        }

        .header p {
            color: #888899;
            margin-top: 8px;
        }

        .btn {
            background: linear-gradient(135deg, #7657e8, #a36cf0);
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 5px 15px rgba(120, 85, 230, 0.25);
        }

        .btn:hover {
            opacity: 0.9;
        }

        /* STAT CARD */
        .stats {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border-radius: 15px;
            width: 250px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .stat-title {
            color: #888899;
            font-size: 14px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: bold;
            margin-top: 8px;
            color: #7657e8;
        }

        /* TABLE CARD */
        .table-card {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.05);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .table-header h2 {
            margin: 0;
            font-size: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f5f3ff;
            color: #6d5aa3;
            padding: 15px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 16px 15px;
            border-bottom: 1px solid #eeeeF5;
        }

        tr:hover td {
            background: #faf9ff;
        }

        .id {
            color: #7657e8;
            font-weight: bold;
        }

        .badge {
            background: #eeeaff;
            color: #7657e8;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .edit {
            color: #7657e8;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        .hapus {
            color: #e05268;
            text-decoration: none;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            color: #999;
            padding: 30px;
        }

        /* RESPONSIVE */
        @media (max-width: 800px) {

            .sidebar {
                width: 70px;
                padding: 25px 10px;
            }

            .logo {
                font-size: 0;
                text-align: center;
            }

            .logo span {
                font-size: 24px;
            }

            .menu {
                font-size: 0;
                text-align: center;
            }

            .content {
                margin-left: 70px;
                padding: 25px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .stats {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
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


<!-- CONTENT -->
<div class="content">

    <div class="header">

        <div>
            <h1>Data Mata Pelajaran</h1>
            <p>Kelola data mata pelajaran dengan mudah.</p>
        </div>

        <a href="tambah_mapel.php" class="btn">
            + Tambah Data
        </a>

    </div>


    <!-- STAT -->
    <div class="stats">

        <div class="stat-card">
            <div class="stat-title">
                Total Mata Pelajaran
            </div>

            <div class="stat-number">
                <?= $total; ?>
            </div>
        </div>

    </div>


    <!-- TABLE -->
    <div class="table-card">

        <div class="table-header">

            <h2>Daftar Mata Pelajaran</h2>

        </div>

        <table>

            <tr>
                <th>No</th>
                <th>ID Mapel</th>
                <th>Nama Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>

            <?php

            $no = 1;

            if ($total > 0) {

                while ($data = mysqli_fetch_assoc($query)) {

            ?>

            <tr>

                <td>
                    <?= $no++; ?>
                </td>

                <td>
                    <span class="badge">
                        <?= $data['idmapel']; ?>
                    </span>
                </td>

                <td class="id">
                    <?= $data['namamapel']; ?>
                </td>

                <td>

                    <a class="edit"
                       href="edit_mapel.php?idmapel=<?= $data['idmapel']; ?>">
                        Edit
                    </a>

                    <a class="hapus"
                       href="hapus_mapel.php?idmapel=<?= $data['idmapel']; ?>"
                       onclick="return confirm('Yakin ingin menghapus data ini?')">
                        Hapus
                    </a>

                </td>

            </tr>

            <?php

                }

            } else {

            ?>

            <tr>
                <td colspan="4" class="empty">
                    Belum ada data mata pelajaran.
                </td>
            </tr>

            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>