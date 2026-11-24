
<?php
require_once 'koneksi.php';

$sql = "SELECT * FROM anggota";
$hasil = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows($hasil);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
</head>
<body>

<h2>Data Anggota Perpustakaan</h2>

<table border="1">
    <tr>
        <th>No</th>
        <th>ID Anggota</th>
        <th>Nama Anggota</th>
        <th>Alamat Anggota</th>
        <th>Kota Anggota</th>
        <th>Telepon Anggota</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    while ($baris = mysqli_fetch_assoc($hasil)) {
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo htmlspecialchars($baris["id_anggota"]); ?></td>
        <td><?php echo htmlspecialchars($baris["nama_anggota"]); ?></td>
        <td><?php echo htmlspecialchars($baris["alamat_anggota"]); ?></td>
        <td><?php echo htmlspecialchars($baris["kota_anggota"]); ?></td>
        <td><?php echo htmlspecialchars($baris["telp_anggota"]); ?></td>
        <td>
            <a href="detail.php?id=<?php echo urlencode($baris["id_anggota"]); ?>">Detail</a>

            <form action="hapus.php" method="post"
                onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($baris["id_anggota"]); ?>">
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    <?php } ?>

</table>

<p>Jumlah Data: <?php echo $jumlah; ?></p>

<?php mysqli_free_result($hasil); ?>

</body>
</html>
