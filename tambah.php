<?php
require 'config/koneksi.php';
require 'config/bahasa.php';
require 'includes/auth.php';
$error = '';
$isbn = $judul = $penulis = $penerbit = '';

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
              "INSERT INTO buku (isbn, judul, penulis, penerbit, tahun) VALUES (?,?,?,?,?)");
            mysqli_stmt_bind_param($stmt, "ssssi", $isbn, $judul, $penulis, $penerbit, $tahun);
            mysqli_stmt_execute($stmt);
            header("Location: index.php");
            exit;
        } catch (mysqli_sql_exception $e) {
            $error = $t['isbn_ada'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="<?= $_SESSION['lang'] ?>">
<head><meta charset="UTF-8"><title><?= $t['tambah'] ?></title></head>
<body>
<p><a href="ganti_bahasa.php?lang=id">ID</a> | <a href="ganti_bahasa.php?lang=en">EN</a></p>
<h2><?= $t['tambah'] ?></h2>
<?php if ($error): ?><p style="color:red"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="POST">
  <p><?= $t['isbn'] ?><br>
     <input type="text" name="isbn" value="<?= htmlspecialchars($isbn) ?>"></p>
  <p><?= $t['judul_buku'] ?><br>
     <input type="text" name="judul" value="<?= htmlspecialchars($judul) ?>"></p>
  <p><?= $t['penulis'] ?><br>
     <input type="text" name="penulis" value="<?= htmlspecialchars($penulis) ?>"></p>
  <p><?= $t['penerbit'] ?><br>
     <input type="text" name="penerbit" value="<?= htmlspecialchars($penerbit) ?>"></p>
  <p><?= $t['tahun'] ?><br>
     <input type="text" name="tahun" value="<?= htmlspecialchars($_POST['tahun'] ?? '') ?>"></p>
  <button type="submit"><?= $t['simpan'] ?></button>
  <a href="index.php"><?= $t['kembali'] ?></a>
</form>
</body>
</html>