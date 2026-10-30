<?php
require 'config/koneksi.php';
require 'config/bahasa.php';
require 'includes/auth.php';
$hasil = mysqli_query($conn, "SELECT * FROM buku ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="<?= $_SESSION['lang'] ?>">
<head><meta charset="UTF-8"><title><?= $t['judul'] ?></title></head>
<body>
<p>
  <a href="ganti_bahasa.php?lang=id">ID</a> |
  <a href="ganti_bahasa.php?lang=en">EN</a> |
  <a href="logout.php"><?= $t['logout'] ?></a>
</p>
<h2><?= $t['judul'] ?></h2>
<a href="tambah.php"><?= $t['tambah'] ?></a>
<br><br>
<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th><th><?= $t['isbn'] ?></th><th><?= $t['judul_buku'] ?></th>
    <th><?= $t['penulis'] ?></th><th><?= $t['penerbit'] ?></th>
    <th><?= $t['tahun'] ?></th><th><?= $t['aksi'] ?></th>
  </tr>
  <?php $no = 1; while ($row = mysqli_fetch_assoc($hasil)): ?>
  <tr>
    <td><?= $no++ ?></td>
    <td><?= htmlspecialchars($row['isbn']) ?></td>
    <td><?= htmlspecialchars($row['judul']) ?></td>
    <td><?= htmlspecialchars($row['penulis']) ?></td>
    <td><?= htmlspecialchars($row['penerbit']) ?></td>
    <td><?= (int) $row['tahun'] ?></td>
    <td>
      <a href="edit.php?id=<?= (int) $row['id'] ?>"><?= $t['edit'] ?></a>
      <form action="hapus.php" method="POST" style="display:inline"
            onsubmit="return confirm('<?= $t['yakin'] ?>')">
        <input type="hidden" name="id" value="<?= (int) $row['id'] ?>">
        <button type="submit"><?= $t['hapus'] ?></button>
      </form>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
</body>
</html>