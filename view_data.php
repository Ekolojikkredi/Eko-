<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }

    $user_data = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veri Görüntüle</title>
</head>
<body>
    <h1>Merhaba, <?php echo $user_data['name']; ?>!</h1>
    <h2>Hesap Bilgileriniz:</h2>
    <p><strong>Okul Adı:</strong> <?php echo $user_data['school_name']; ?></p>
    <p><strong>Kredi:</strong> <?php echo $user_data['credit']; ?> Puan</p>
    <p><strong>Ünvan:</strong> <?php echo isset($user_data['title']) ? $user_data['title'] : "Ünvanınız yok."; ?></p>

    <h3>Geri Dönüşüm Yaparak Kazandığınız Kredi</h3>
    <table>
        <thead>
            <tr>
                <th>Atık Türü</th>
                <th>Miktar</th>
                <th>Hesaplanan Kredi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Kullanıcı verilerini görüntüleme için -->
            <?php
                // Kayıtlı verilerinizi ekleyin
                // Bu örnekte sadece statik veri kullanıyoruz
                $data_entries = [
                    ['waste_type' => 'Plastik', 'amount' => 5, 'credit' => 25],
                    ['waste_type' => 'Kağıt', 'amount' => 3, 'credit' => 6],
                    ['waste_type' => 'Cam', 'amount' => 2, 'credit' => 6]
                ];

                foreach ($data_entries as $entry) {
                    echo "<tr>
                        <td>{$entry['waste_type']}</td>
                        <td>{$entry['amount']} kg</td>
                        <td>{$entry['credit']} Puan</td>
                    </tr>";
                }
            ?>
        </tbody>
    </table>

    <p><a href="data_entry.php">Yeni Veri Girişi Yap</a></p>
    <p><a href="logout.php">Çıkış Yap</a></p>
</body>
</html>
