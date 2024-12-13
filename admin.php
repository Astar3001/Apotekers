<?php
session_start();

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Jika belum login, arahkan ke halaman login
    exit();
}

// Mengambil username dari sesi
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotekers Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#"><i class="fas fa-box"></i> Produk</a>
        <a href="transaksi.html"><i class="fas fa-exchange-alt"></i> Transaksi</a>
        <a href="login.html"><i class="fas fa-sign-out-alt"></i> Log Out</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Top Navigation -->
        <div class="topnav">
            <div>
                <a href="#">Home</a>
                <a href="#">Contact</a>
                <a href="#">Profil</a>
                <a href="#">Search</a>
            </div>
            <button class="btn-apotek">Pilih Lokasi Apotek</button>
        </div>

        <!-- Products Section -->
        <div class="products">
            <div class="product-card">
                <img src="Picture\fitkom_fitkom-rasa-strawberry-21-tablet-hisap-vitamin-anak_full01.jpg" alt="Product 1">
                <p>Fitkom Rasa Strawberry 21 Tablet Hisap Vitamin Anak</p>
                <p>Rp.19.500</p>
                <button class="btn-buy">Beli</button>
            </div>
            <div class="product-card">
                <img src="Picture\162839138_5cc161e8-b13a-4f58-aa5e-325b5c0a260e.jpg" alt="Product 2">
                <p>Mixagrip Flu & Batuk Tablet</p>
                <p>Rp.3.500</p>
                <button class="btn-buy">Beli</button>
            </div>
            <div class="product-card">
                <img src="Picture\apotek_online_k24klik_20160817122026291_diabetasol.jpg" alt="Product 3">
                <p>Diabetasol Vita Digest Coklat 570g</p>
                <p>Rp.168.500</p>
                <button class="btn-buy">Beli</button>
            </div>
            <div class="product-card">
                <img src="Picture\apotek_online_k24klik_20230126100108359225_KOMIX-OBH-7ML-SACH.jpg" alt="Product 4">
                <p>Komix Obh 7ml Sach (per Pcs)</p>
                <p>Rp.2.000</p>
                <button class="btn-buy">Beli</button>
            </div>
            <div class="product-card">
                <img src="Picture\apotek_online_k24klik_2020030310025723085_MASKIT-ALL-ARROUND.jpg" alt="Product 5">
                <p>Maskit Masker Reusable Pcs</p>
                <p>Rp. 15.000</p>
                <button class="btn-buy">Beli</button>
            </div>
        </div>

        <!-- Doctor Consultation -->
        <div class="consultation">
            <img src="Picture\apotek_online_k24klik_20240730031137568928_ikon-konsultasi-dokter.jpg" alt="Doctor">
            <p>Konsultasi Dokter</p>
        </div>
    </div>

    <!-- JavaScript: Alert on Button Click -->
    <script>
        const buttons = document.querySelectorAll('.btn-buy');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                alert('Produk berhasil ditambahkan ke keranjang!');
            });
        });
    </script>

</body>
</html>