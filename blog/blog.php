<?php
session_start();
require_once '../vendor/connect.php';

$result = $connect->query("SELECT * FROM users WHERE id='".$_SESSION['user']['id']."'"); 
$row = $result->fetch_assoc(); 
$rol = $row['rol'];
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Блог</title>
<link rel="stylesheet" href="../assets/css/stylemenu.css"/>
<link rel="stylesheet" href="../assets/css/styleblogo.css"/>
<link rel="stylesheet" href="../assets/css/stylefon.css"/>
</head>
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
<section id="banner">
<hr>
<h1><a href="blog.php" id="logo">Блог</a></h1>
<hr>
 <a class="button" href="blogform.php" >Создать статью</a>
           <?php
            if (isset($_SESSION['message_blog'])) {
                echo '<p class="msg"> ' . $_SESSION['message_blog'] . ' </p>';
            }
            unset($_SESSION['message_blog']);
        ?>
		
		
		
<?php		
	if($rol == 2){ 
		echo'<hr>
		<h2>Проверка статей пользователей</h2>
		<a class="button" href="blog_prow.php" >Перейти</a>
 		<hr>';
	}
		else
			
?>
</section>

<div class="exclusive">
<?php
$pr=1;
$connect->set_charset("utf8mb4"); // задаем кодировку
$result = $connect->query("SELECT * FROM articles where checks = '".$pr."' "); // запрос на выборку
while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
{	
	echo'<div class="game"';
	echo'<header>';
	echo'<td><form method="POST" action="article.php? id='.$row['id'].'">
	<button  class="btn_2">'.$row['name'].'</button>
	</form></td>';
	echo'</header>';
	echo'<p>Автор:'.$row['login_user'].'</p>';
	echo'<p>'.$row['description'].'</p>';
	echo'</div>';
	
}
?>
</div>

</body>