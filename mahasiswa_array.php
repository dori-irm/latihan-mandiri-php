<?php
$mahasiswa = [
    ["nim" => "2024001", "nama" => "Budi Santoso", "nilai" => 85],
    ["nim" => "2024002", "nama" => "Siti Aminah", "nilai" => 78],
    ["nim" => "2024003", "nama" => "Rudi Hermawan", "nilai" => 65],
    ["nim" => "2024004", "nama" => "Dewi Lestari", "nilai" => 90],
    ["nim" => "2024005", "nama" => "Ahmad Fauzi", "nilai" => 55],
];

$total_nilai = 0;
foreach ($mahasiswa as $mhs) {
    $total_nilai += $mhs['nilai'];
}
$rata_rata = $total_nilai / count($mahasiswa);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Daftar Nilai Mahasiswa</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $index => $mhs): ?>
            <tr>
                <td><?= $index + 1; ?></td>
                <td><?= htmlspecialchars($mhs['nim']); ?></td>
                <td><?= htmlspecialchars($mhs['nama']); ?></td>
                <td><?= $mhs['nilai']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Rata-Rata Nilai</th>
                <th><?= number_format($rata_rata, 2); ?></th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
