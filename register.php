<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Kullanıcıdan alınan bilgiler
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $school_name = $_POST['school_name'];

        // Kullanıcı bilgilerini JSON dosyasına kaydet
        $user_data = [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'name' => $name,
            'surname' => $surname,
            'school_name' => $school_name
        ];

        // LocalStorage'ı taklit etmek için JSON dosyasına yazma
        $file = 'users.json';
        $existing_data = file_get_contents($file);
        $decoded_data = json_decode($existing_data, true);
        $decoded_data[] = $user_data;

        file_put_contents($file, json_encode($decoded_data));

        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
</head>
<body>
    <form action="register.php" method="POST">
        <label for="name">İsim:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="surname">Soyisim:</label>
        <input type="text" id="surname" name="surname" required><br><br>

        <label for="email">E-posta:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Şifre:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="school_name">Okul Adı:</label>
        <input type="text" id="school_name" name="school_name" required><br><br>

        <button type="submit">Kaydol</button>
    </form>
</body>
</html>
