<?php
session_start();

// Menghancurkan sesi untuk logout
session_unset();
session_destroy();

// Mengarahkan pengguna ke halaman login
header("Location: login.php");
exit();