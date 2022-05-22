<?php
session_start();
require_once '../vendor/connect.php';
if (!$_SESSION['user']) {
	
$_SESSION['message_blog'] = 'Авторизируйтесь чтобы написать статью!';

    header('Location:blog.php');
}
?>
<html>
<head>
	<title>Регистрация</title>
	<link rel="stylesheet" href="../assets/css/stylemenu.css"/>
	<link rel="stylesheet" href="../assets/css/styleform.css">
	<link rel="stylesheet" href="../assets/css/stylefon.css"/>
</head>
<body>
<body id="body">
<div class="d1">
<div id="fon1">
	<input type="checkbox" id="nav-toggle" hidden>
    <nav class="nav">

        <label for="nav-toggle" class="nav-toggle" onclick></label>
        <h2 class="logo"> 
            <a href="../index.php">Копьютерные игры</a> 
        </h2>
        <ul>
            <li><a href="../index.php">Главная</a>
			<hr>
            <li><a href="../magazin.php">Магазин</a>
			<hr>
			<li><a href="../cart.php">Корзина</a>
			<hr>
            <li><a href="blog.php">Блог</a>
			<hr>
            <li><a href="../kabinet.php">Личный кабинет</a>
			<hr>
        </ul>
    </nav>
<section class="container">
    <div class="login">
      <h5>Создание статьи</h5>
      <form action="../vendor/addarticl.php" method="post" enctype="multipart/form-data">
	  			        <?php
            if (isset($_SESSION['message_blog'])) {
                echo '<p class="msg"> ' . $_SESSION['message_blog'] . ' </p>';
            }
            unset($_SESSION['message_blog']);
        ?>
			<p>Заголовок <input name="name" type="text" required><br></p>
			<p>Постер <input type="file" name="poster" required><br></p>
			<p>Краткое описание <input name="description" type="text" required><br></p>
			<p>Текст</p><p><textarea name="text" type="text" required></textarea><br></p>
			<input name="submit" type="submit" value="Загрузить">
			<a class="button" href="blog.php" >Отмена</a>

      </form>
    </div>
  </section>
</body>
</html>