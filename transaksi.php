<?php
session_start();

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Jika belum login, arahkan ke halaman login
    exit();
}

// Simulasi data transaksi
// Misalnya transaksi disimpan di session pengguna
if (!isset($_SESSION['transactions'])) {
    $_SESSION['transactions'] = []; // Inisialisasi array transaksi
}

// Menambah transaksi baru jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $nama_produk = $_POST['nama_produk'];
    $produk = $_POST['produk'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];

    // Menambahkan transaksi baru ke array session
    $_SESSION['transactions'][] = [
        'tanggal' => $tanggal,
        'nama_produk' => $nama_produk,
        'produk' => $produk,
        'harga' => $harga,
        'status' => $status
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link rel="stylesheet" href="transaksi.css">
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="admin.html"><i class="fas fa-box"></i> Produk</a>
        <a href="#"><i class="fas fa-exchange-alt"></i> Transaksi</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <div class="topnav">
            <div class="nav-links">
                <a href="#">Home</a>
                <a href="#">Contact</a>
                <a href="#">Profil</a>
                <a href="#">Search</a>
            </div>
            <button class="btn-apotek">Pilih Lokasi Apotek</button>
        </div>

        <!-- Transaction Section -->
        <div class="transaction-section">
            <h2>Transaksi</h2>

            <!-- Form untuk menambah transaksi -->
            <form method="POST" action="transaksi.php">
                <input type="date" name="tanggal" required><br>
                <input type="text" name="nama_produk" placeholder="Nama Produk" required><br>
                <input type="text" name="produk" placeholder="Jenis Produk" required><br>
                <input type="number" name="harga" placeholder="Harga" required><br>
                <select name="status" required>
                    <option value="Pending">Pending</option>
                    <option value="Success">Success</option>
                    <option value="Failed">Failed</option>
                </select><br>
                <button type="submit">Tambah Transaksi</button>
            </form>

            <!-- Daftar transaksi -->
            <table class="transaction-table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Menampilkan transaksi yang ada
                    foreach ($_SESSION['transactions'] as $transaction) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($transaction['tanggal']) . "</td>";
                        echo "<td>" . htmlspecialchars($transaction['nama_produk']) . "</td>";
                        echo "<td>" . htmlspecialchars($transaction['produk']) . "</td>";
                        echo "<td>" . number_format($transaction['harga'], 0, ',', '.') . "</td>";
                        echo "<td><span class='status " . strtolower($transaction['status']) . "'>" . htmlspecialchars($transaction['status']) . "</span></td>";
                        echo "<td><button class='btn-detail'>Detail</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>