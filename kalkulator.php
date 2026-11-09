<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Sederhana</title>
</head>
<body>
    <h2>Kalkulator PHP</h2>
    <form method="POST">
        <input type="number" step="any" name="angka1" placeholder="Angka Pertama" required>
        <select name="operator" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" step="any" name="angka2" placeholder="Angka Kedua" required>
        <button type="submit" name="hitung">Hitung</button>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $angka1 = $_POST['angka1'];
        $angka2 = $_POST['angka2'];
        $operator = $_POST['operator'];
        $hasil = '';
        $error = '';

        switch ($operator) {
            case '+':
                $hasil = $angka1 + $angka2;
                break;
            case '-':
                $hasil = $angka1 - $angka2;
                break;
            case '*':
                $hasil = $angka1 * $angka2;
                break;
            case '/':
                // Penanganan pembagian dengan nol
                if ($angka2 == 0) {
                    $error = "Kesalahan: Tidak dapat melakukan pembagian dengan angka 0!";
                } else {
                    $hasil = $angka1 / $angka2;
                }
                break;
        }

        echo "<h3>Hasil:</h3>";
        if ($error != '') {
            echo "<p style='color:red;'>$error</p>";
        } else {
            echo "<p>$angka1 $operator $angka2 = <strong>$hasil</strong></p>";
        }
    }
    ?>
</body>
</html>
