<?php
if (!isset($_SESSION['lang'])) $_SESSION['lang'] = 'id';

$teks = [
  'id' => [
    'judul' => 'Katalog Buku', 'tambah' => 'Tambah Buku', 'ubah_judul' => 'Ubah Buku',
    'isbn' => 'ISBN', 'judul_buku' => 'Judul', 'penulis' => 'Penulis',
    'penerbit' => 'Penerbit', 'tahun' => 'Tahun', 'aksi' => 'Aksi',
    'edit' => 'Ubah', 'hapus' => 'Hapus', 'simpan' => 'Simpan', 'kembali' => 'Kembali',
    'login' => 'Masuk', 'logout' => 'Keluar', 'username' => 'Nama Pengguna',
    'password' => 'Kata Sandi', 'yakin' => 'Yakin hapus buku ini?',
    'wajib' => 'Semua kolom wajib diisi!',
    'tahun_salah' => 'Tahun tidak valid!',
    'isbn_ada' => 'ISBN sudah terdaftar!',
    'login_salah' => 'Username / password salah',
  ],
  'en' => [
    'judul' => 'Book Catalog', 'tambah' => 'Add Book', 'ubah_judul' => 'Edit Book',
    'isbn' => 'ISBN', 'judul_buku' => 'Title', 'penulis' => 'Author',
    'penerbit' => 'Publisher', 'tahun' => 'Year', 'aksi' => 'Action',
    'edit' => 'Edit', 'hapus' => 'Delete', 'simpan' => 'Save', 'kembali' => 'Back',
    'login' => 'Login', 'logout' => 'Logout', 'username' => 'Username',
    'password' => 'Password', 'yakin' => 'Delete this book?',
    'wajib' => 'All fields are required!',
    'tahun_salah' => 'Invalid year!',
    'isbn_ada' => 'ISBN is already registered!',
    'login_salah' => 'Wrong username / password',
  ],
];
$t = $teks[$_SESSION['lang']];