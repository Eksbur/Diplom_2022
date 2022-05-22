<?php
session_start();
require_once '../vendor/connect.php';
$id2=$_GET['id'];

$query = mysqli_query($connect, "SELECT * FROM articles WHERE id = '$id2'");
$deskRow = mysqli_fetch_array($query);
$title = $deskRow['name'];
$login_user = $deskRow['login_user'];
$text = $deskRow['text'];
$poster = $deskRow['poster'];
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
			<p>Заголовок <input name="name" type="text" required><br></p>
			<p>Постер <input type="file" name="poster" required><br></p>
			<p>Краткое описание <input name="description" type="text" required><br></p>
			<p>Текст</p><p><textarea name="text" type="text" required></textarea><br></p>
			<input name="submit" type="submit" value="Загрузить">
			<a class="button" href="blog.php" >Отмена</a>
			        <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
      </form>
    </div>
  </section>
</body>
</html>