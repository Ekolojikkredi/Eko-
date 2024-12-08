<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Veri girişine göre kredi hesaplama
        $waste_type = $_POST['waste_type'];
        $amount = $_POST['amount'];

        $credit = 0;

        // Geri dönüşüm türüne göre puan
        if ($waste_type == 'plastik') {
            $credit = $amount * 5;
        } elseif ($waste_type == 'kağıt') {
            $credit = $amount * 2;
        } elseif ($waste_type == 'cam') {
            $credit = $amount * 3;
        }

        // Kullanıcı verisini güncelleme
        $_SESSION['user']['credit'] += $credit;

        // Güncellenmiş veriyi JSON dosyasına kaydetme
        $file = 'users.json';
        $existing_data = file_get_contents($file);
        $decoded_data = json_decode($existing_data, true);

        foreach ($decoded_data as &$user) {
            if ($user['email'] == $_SESSION['user']['email']) {
                $user['credit'] = $_SESSION['user']['credit'];
                break;
            }
        }

        file_put_contents($file, json_encode($decoded_data));

        $message = "Başarılı bir şekilde veri girdiniz ve kredi kazandınız!";
    }
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veri Girişi</title>
</head>
<body>
    <h1>Merhaba, <?php echo $_SESSION['user']['name']; ?>! Kredi kazanmak için veri girin.</h1>

    <form action="data_entry.php" method="POST">
        <label for="waste_type">Atık Türü:</label>
        <select id="waste_type" name="waste_type" required>
            <option value="plastik">Plastik</option>
            <option value="kağıt">Kağıt</option>
            <option value="cam">Cam</option>
        </select><br><br>

        <label for="amount">Miktar (kg):</label>
        <input type="number" id="amount" name="amount" min="0" required><br><br>

        <button type="submit">Veri Girişi Yap</button>
    </form>

    <?php if(isset($message)): ?>
        <p style="color:green;"><?php echo $message; ?></p>
    <?php endif; ?>

    <p><a href="view_data.php">Veri Görüntüle</a></p>
    <p><a href="logout.php">Çıkış Yap</a></p>
</body>
</html>
