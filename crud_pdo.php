<?php
// Konfigurasi Database PDO
$host = 'localhost';
$dbname = 'db_kuliah';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Proses Tambah Data dengan Prepared Statement
$pesan = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = trim($_POST['nim']);
    $nama = trim($_POST['nama']);
    $nilai = trim($_POST['nilai']);

    if (!empty($nim) && !empty($nama) && $nilai !== '') {
        $sql = "INSERT INTO mahasiswa (nim, nama, nilai) VALUES (:nim, :nama, :nilai)";
        $stmt = $pdo->prepare($sql);
        
        // Binding parameter untuk keamanan (Mencegah SQL Injection)
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':nilai', $nilai, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $pesan = "Data mahasiswa berhasil ditambahkan!";
        } else {
            $pesan = "Gagal menambah data.";
        }
    } else {
        $pesan = "Harap isi semua kolom!";
    }
}

// Ambil Semua Data Mahasiswa
$stmtSelect = $pdo->query("SELECT * FROM mahasiswa ORDER BY id DESC");
$daftar_mahasiswa = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Data Mahasiswa (PDO)</title>
</head>
<body>
    <h2>Form Tambah Mahasiswa</h2>
    <?php if ($pesan != ''): ?>
        <p style="color: green;"><?= htmlspecialchars($pesan); ?></p>
    <?php endif; ?>

    <form method="POST">
        <div>
            <label>NIM:</label><br>
            <input type="text" name="nim" required>
        </div><br>
        <div>
            <label>Nama:</label><br>
            <input type="text" name="nama" required>
        </div><br>
        <div>
            <label>Nilai:</label><br>
            <input type="number" name="nilai" min="0" max="100" required>
        </div><br>
        <button type="submit">Simpan Mahasiswa</button>
    </form>

    <hr>

    <h2>Daftar Mahasiswa</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($daftar_mahasiswa) > 0): ?>
                <?php foreach ($daftar_mahasiswa as $row): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['nim']); ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= $row['nilai']; ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Belum ada data mahasiswa.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
