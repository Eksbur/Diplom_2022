<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: index.php');
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/stylemenu.css">
	<link rel="stylesheet" href="assets/css/stylefon.css">
</head>
<body>

<body id="body">
        <ul class="body_slides">
            <li></li>
            <li></li>
            <li></li>
			<li></li>
			<li></li>
        </ul>
<div class="d1">
<div id="fon1">
    <input type="checkbox" id="nav-toggle" hidden>
    <nav class="nav">

        <label for="nav-toggle" class="nav-toggle" onclick></label>
        <h2 class="logo"> 
            <a href="../index.php">Копьютерные игры</a> 
        </h2>
        <ul>
            <li><a href="index.php">Главная</a>
			<hr>
            <li><a href="magazin.php">Магазин</a>
			<hr>
			<li><a href="cart.php">Корзина</a>
			<hr>
            <li><a href="blog/blog.php">Блог</a>
			<hr>
            <li><a href="kabinet.php">Личный кабинет</a>
			<hr>
        </ul>
    </nav>
<!-- Форма авторизации -->

    <form action="vendor/signin.php" method="post">
		<h5>Авторизация</h5>
        <h2>Логин</h2>
        <input type="text" name="login" placeholder="Введите свой логин" required >
        <h2>Пароль</h2>
        <input type="password" name="password" placeholder="Введите пароль" required >
        <button type="submit">Войти</button>
	    <hr>
        <p>
            У вас нет аккаунта? 
        </p>
		<p><a href="register.php">зарегистрируйтесь</a></p>
        <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>