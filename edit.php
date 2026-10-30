<?php
require 'config/koneksi.php';
require 'config/bahasa.php';
require 'includes/auth.php';
$error = '';
$id = (int) ($_GET['id'] ?? $_POST['id'] ?? 0);

$stmt = mysqli_prepare($conn, "SELECT * FROM buku WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$buku = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
if (!$buku) { header("Location: index.php"); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn      = trim($_POST['isbn'] ?? '');
    $judul     = trim($_POST['judul'] ?? '');
    $penulis   = trim($_POST['penulis'] ?? '');
    $penerbit  = trim($_POST['penerbit'] ?? '');
    $tahun_raw = trim($_POST['tahun'] ?? '');
    $tahun     = filter_var($tahun_raw, FILTER_VALIDATE_INT,
                   ['options' => ['min_range' => 1500, 'max_range' => (int) date('Y')]]);

    if ($isbn === '' || $judul === '' || $penulis === '' || $penerbit === '' || $tahun_raw === '') {
        $error = $t['wajib'];
    } elseif ($tahun === false) {
        $error = $t['tahun_salah'];
    } else {
        try {
            $stmt = mysqli_prepare($conn,
              "UPDATE buku SET isbn=?, judul=?, penulis=?, penerbit=?, tahun=? WHERE id=?");
            mysqli_stmt_bind_param($stmt, "ssssii", $isbn, $judul, $penulis, $penerbit, $tahun, $id);
            mysqli_stmt_execute($stmt);
            header("Location: index.php");
            exit;
        } catch (mysqli_sql_exception $e) {
            $error = $t['isbn_ada'];
        }
    }
    // jika error, tampilkan kembali input terakhir
    $buku = ['isbn' => $isbn, 'judul' => $judul, 'penulis' => $penulis,
             'penerbit' => $penerbit, 'tahun' => $tahun_raw];
}
?>
<!DOCTYPE html>
<html lang="<?= $_SESSION['lang'] ?>">
<head><meta charset="UTF-8"><title><?= $t['ubah_judul'] ?></title></head>
<body>
<p><a href="ganti_bahasa.php?lang=id">ID</a> | <a href="ganti_bahasa.php?lang=en">EN</a></p>
<h2><?= $t['ubah_judul'] ?></h2>
<?php if ($error): ?><p style="color:red"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="POST">
  <input type="hidden" name="id" value="<?= $id ?>">
  <p><?= $t['isbn'] ?><br>
     <input type="text" name="isbn" value="<?= htmlspecialchars($buku['isbn']) ?>"></p>
  <p><?= $t['judul_buku'] ?><br>
     <input type="text" name="judul" value="<?= htmlspecialchars($buku['judul']) ?>"></p>
  <p><?= $t['penulis'] ?><br>
     <input type="text" name="penulis" value="<?= htmlspecialchars($buku['penulis']) ?>"></p>
  <p><?= $t['penerbit'] ?><br>
     <input type="text" name="penerbit" value="<?= htmlspecialchars($buku['penerbit']) ?>"></p>
  <p><?= $t['tahun'] ?><br>
     <input type="text" name="tahun" value="<?= htmlspecialchars($buku['tahun']) ?>"></p>
  <button type="submit"><?= $t['simpan'] ?></button>
  <a href="index.php"><?= $t['kembali'] ?></a>
</form>
</body>
</html>