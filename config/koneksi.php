<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect("localhost", "root", "", "katalog_buku");
mysqli_set_charset($conn, "utf8mb4");