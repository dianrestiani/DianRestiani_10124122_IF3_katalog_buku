<?php
session_start();
$lang = $_GET['lang'] ?? 'id';
$_SESSION['lang'] = in_array($lang, ['id', 'en']) ? $lang : 'id';
header("Location: " . ($_SERVER['HTTP_REFERER'] ?? 'index.php'));
exit;