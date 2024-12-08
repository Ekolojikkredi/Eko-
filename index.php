<?php include('includes/header.php'); ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekolojik Kredi Sistemi</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="about.php">Proje Hakkında</a></li>
                <li><a href="contact.php">Bize Ulaşın</a></li>
                <li><a href="register.php">Kayıt Ol</a></li>
                <li><a href="login.php">Giriş Yap</a></li>
                <li><a href="data_entry.php">Veri Girişi</a></li>
                <li><a href="view_data.php">Veri Görüntüle</a></li>
            </ul>
        </div>

        <div class="main-content">
            <h1>Ekolojik Kredi Sistemi</h1>
            <p>Ekolojik kredi kazanmak için geri dönüşüm yapın ve çevreye katkı sağlayın.</p>

            <div class="buttons">
                <button onclick="window.location.href='register.php'">Kayıt Ol</button>
                <button onclick="window.location.href='data_entry.php'">Veri Girişi</button>
                <button onclick="window.location.href='view_data.php'">Veri Görüntüle</button>
            </div>

            <section>
                <h2>Geri Dönüşüm Nedir?</h2>
                <p>Geri dönüşüm, atıkların yeniden işlenerek, yeniden kullanılabilir hale getirilmesidir...</p>
            </section>

            <section>
                <h2>Ekolojik Kredi Nedir?</h2>
                <p>Ekolojik kredi, çevresel etkilerin azaltılması amacıyla yapılan çalışmaların ödüllendirildiği bir sistemdir...</p>
            </section>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
