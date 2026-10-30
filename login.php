<?php
require 'config/koneksi.php';
require 'config/bahasa.php';

if (isset($_SESSION['user'])) { header("Location: index.php"); exit; }
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = $t['wajib'];
    } else {
        $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user'] = $user['username'];
            header("Location: index.php");
            exit;
        }
        $error = $t['login_salah'];
    }
}
?>
<!DOCTYPE html>
<html lang="<?= $_SESSION['lang'] ?>">
<head><meta charset="UTF-8"><title><?= $t['login'] ?></title></head>
<body>
<p><a href="ganti_bahasa.php?lang=id">ID</a> | <a href="ganti_bahasa.php?lang=en">EN</a></p>
<h2><?= $t['login'] ?></h2>
<?php if ($error): ?><p style="color:red"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="POST">
  <p><?= $t['username'] ?><br><input type="text" name="username"></p>
  <p><?= $t['password'] ?><br><input type="password" name="password"></p>
  <button type="submit"><?= $t['login'] ?></button>
</form>
</body>
</html>