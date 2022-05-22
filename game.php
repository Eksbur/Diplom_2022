
<?php
session_start();
require_once 'vendor/connect.php';
$id2=$_GET['id'];

$query = mysqli_query($connect, "SELECT * FROM game WHERE id = '$id2'");
$deskRow = mysqli_fetch_array($query);
$id = $deskRow['id'];
$name = $deskRow['name'];
$price = $deskRow['price'];
$genre = $deskRow['genre'];
$platform = $deskRow['platform'];
$game_date = $deskRow['game_date'];
$poster = $deskRow['poster'];
$trailer = $deskRow['trailer'];
$description = $deskRow['description'];
$identifier = $deskRow['identifier'];

$dev = $deskRow['developer'];
$pub = $deskRow['publisher'];

$query = mysqli_query($connect, "SELECT * FROM publisher WHERE id = '$pub'");
$deskRow = mysqli_fetch_array($query);
$publisher = $deskRow['name'];

$query = mysqli_query($connect, "SELECT * FROM developer WHERE id = '$dev'");
$deskRow = mysqli_fetch_array($query);
$developer = $deskRow['name'];


$res = mysqli_query($connect, "SELECT * FROM keyspisok WHERE identifier='".$identifier."' AND game_name='".$name."'");
$num_rows = mysqli_num_rows($res);
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $name?></title>
<link rel="stylesheet" href="assets/css/stylemenu.css"/>
<link rel="stylesheet" href="assets/css/stylegame.css"/>
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
</div>



<section class='container'>
<div class='banner'>
<div class="image">
 <img src="assets/images/poster/<?= $poster ?>" width="400" alt="">
</div>
<div class="otp">
<h3><?php echo $name?></h3>
<?php
if($num_rows != 0){
echo'<h2>В наличие</h2>';	
	echo'<form method="POST" action="vendor/add_cart.php? id='.$id.'">
	<button  class="btn_2">В корзину</button>
	</form>';
}

else{
echo'<h2>Нет в наличие</h2>';
	echo'<form action="vendor/not_key.php? id='.$id.'">
	<button  class="btn_2">Ключ отсутвует</button>
	</form>';		

}
?>
 <?php


echo'<h2>Цена: '.$price.'</h2>';?>
<div class="tabs">
  <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
  <label for="tab-btn-1">Трейлер</label>
  <input type="radio" name="tab-btn" id="tab-btn-2" value="">
  <label for="tab-btn-2">Об игре</label>
  <input type="radio" name="tab-btn" id="tab-btn-3" value="">
  <label for="tab-btn-3">Информация</label>
  <div id="content-1">
<?php echo'<iframe width="600" height="315" src="'.$trailer.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';?>
  </div>
  <div id="content-2">
  <h5><?php echo $name?></h5>
<?php echo'<h2>'.$description.'</h2>';?>
  </div>
  <div id="content-3">
<?php echo'<h2>Жанр: '.$genre.'</h2>';?>
<?php echo'<h2>Платформа: '.$platform.'</h2>';?>
<?php echo'<h2>Дата релиза: '.$game_date.'</h2>';?>
<?php echo'<h2>Издатель: '.$publisher.'</h2>';?>
<?php echo'<h2>Разработчик:<a href="publisher.php? id='.$pub.'">'.$publisher.'</a></h2>';?>
<?php echo'<h2>Разработчик:<a href="developer.php? id='.$dev.'">'.$developer.'</a></h2>';?>

  </div>
</div>
</div>
		<div id="fon1">
<a class="btn_3" href="magazin.php" >Магазин</a>
</div>
</div>
</section>
</body>
</html>

