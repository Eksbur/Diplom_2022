<?php
session_start();
require_once 'vendor/connect.php';
if (!$_SESSION['message_buy']) {
    header('Location: cart.php');
}
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Корзина</title>
<link rel="stylesheet" href="assets/css/stylemenu.css"/>
<link rel="stylesheet" href="assets/css/stylecart.css"/>
</head>
		<div id="fon1">
    <input type="checkbox" id="nav-toggle" hidden>
    <nav class="nav">

        <label for="nav-toggle" class="nav-toggle" onclick></label>
        <h2 class="logo"> 
            <a href="index.php">Копьютерные игры</a> 
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
	</div>
<div class="banner1">
<hr><?php
            if (isset($_SESSION['message_buy'])) {
                echo '<p class="msg"> ' . $_SESSION['message_buy'] . ' </p>';
				echo '<form method="post" action="history.php">
				<a><input name="submit" type="submit" value="История покупок"></a>
				</form>';
            }
            unset($_SESSION['message_buy']);
			?>
<form method="post" action="magazin.php">
<a><input name="submit" type="submit" value="Продолжить покупку"></a>
 </form>
</div>
</body>
</html>
