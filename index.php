<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator">
        <header>
            <h1>kalkulator</h1>
        </header>
        <form action="proses.php" method="post" id="form-calculator">
            <div class="input-box">
                <input type="text" name="num1" id="num1" placeholder="Angka Pertama" autocomplete="off" value="<?= isset($_GET['num1']) ? $_GET['num1'] : ''?>">
            </div>
            <div class="input-box">
                <input type="text" name="num2" id="num2" placeholder="Angka Kedua" autocomplete="off" value="<?= isset($_GET['num2']) ? $_GET['num2'] : ''?>">
            </div>
            <div class="input-box">
                <select name="operator" id="operator">
                    <option selected>Pilih Operator</option>
                    <option value="addition" <?= isset($_GET['operator']) && $_GET['operator'] == 'addition' ? "selected" : ''; ?>>Tambah</option>
                    <option value="substraction" <?= isset($_GET['operator']) && $_GET['operator'] == 'substraction' ? "selected" : ''; ?>>Kurang</option>
                    <option value="multiply" <?= isset($_GET['operator']) && $_GET['operator'] == 'multiply' ? "selected" : ''; ?>>Kali</option>
                    <option value="division" <?= isset($_GET['operator']) && $_GET['operator'] == 'division' ? "selected" : ''; ?>>Bagi</option>
                </select>
            </div>
            <button type="submit" class="btn-calculate" name="calculate">Hitung</button>
        </form>
        <?php session_start(); ?>
        <div class="result"> Result : <?= isset($_SESSION['pesan']) ? $_SESSION['pesan'] : ''?></div>
        <?php unset($_SESSION['pesan']); ?>
    </div>

</body>
</html>