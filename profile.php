<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: index.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <!-- Профиль -->

    <form>
        <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
        <input type="text" href="#"><?= $_SESSION['user']['email'] ?></input>
		<input href="#"><?= $_SESSION['user']['login'] ?></input>
        <a href="vendor/logout.php" class="logout">Выход</a>
    </form>

</body>
</html>