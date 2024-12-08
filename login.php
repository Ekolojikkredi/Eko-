<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $file = 'users.json';
        $existing_data = file_get_contents($file);
        $decoded_data = json_decode($existing_data, true);

        foreach ($decoded_data as $user) {
            if ($user['email'] == $email && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header("Location: data_entry.php");
                exit();
            }
        }

        $error_message = "E-posta veya şifre hatalı!";
    }
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
</head>
<body>
    <form action="login.php" method="POST">
        <label for="email">E-posta:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Şifre:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Giriş Yap</button>
    </form>

    <?php if(isset($error_message)): ?>
        <p style="color:red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
</body>
</html>
