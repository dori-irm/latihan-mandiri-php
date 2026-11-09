<?php
function konversiNilai(int $nilai): string {
    if ($nilai >= 81 && $nilai <= 100) {
        return "A";
    } elseif ($nilai >= 76 && $nilai <= 80) {
        return "B";
    } elseif ($nilai >= 61 && $nilai <= 75) {
        return "C";
    } elseif ($nilai >= 36 && $nilai <= 60) {
        return "D";
    } elseif ($nilai >= 0 && $nilai <= 35) {
        return "E";
    } else {
        return "Nilai Tidak Valid";
    }
}

// Contoh Pengujian Fungsi:
$contoh_nilai = [85, 78, 65, 45, 20];

echo "<h2>Uji Fungsi Konversi Nilai</h2>";
echo "<ul>";
foreach ($contoh_nilai as $n) {
    echo "<li>Nilai <strong>$n</strong> mendapat Huruf Mutu: <strong>" . konversiNilai($n) . "</strong></li>";
}
echo "</ul>";
?>
