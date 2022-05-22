<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: index.php');
}
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Личный Кабинет</title>
<link rel="stylesheet" href="assets/css/stylemenu.css"/>
<link rel="stylesheet" href="assets/css/stylekabinet.css"/>
<link rel="stylesheet" href="assets/css/stylefon.css"/>
</head>
<body id="body">

        <ul class="body_slides">
            <li></li>
            <li></li>
            <li></li>
			<li></li>
			<li></li>
        </ul>
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




<section class="container">
<div class="banner">
<div class="image">
 <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
</div>
<h2>Логин</h2>
<hr>
        <h4 href="#"><?= $_SESSION['user']['login'] ?></h4>
<hr>
<h2>Email</h2>
<hr>
        <h4 href="#"><?= $_SESSION['user']['email'] ?></h4>
<hr>
<form action="vendor/logout.php" method="post">
	<button  class="btn_2">Выйти</button>
 </form>
<hr>
<div class="navbar">
  <a href="kabinet.php" class="active">Профиль</a>
  <a href="data.php">Личные данные</a>
  <a href="history.php">История покупок</a>
  <a href="dataart.php">Статьи</a>
</div>
<hr>
</div>
</section>
</body>
</html>

