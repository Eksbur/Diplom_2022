<?php
session_start();
require_once 'vendor/connect.php';

if(!isset($_GET['id'])){
	header('Location: magazin.php');
}

$id=$_GET['id'];

$query = mysqli_query($connect, "SELECT * FROM publisher WHERE id = '$id'");
$deskRow = mysqli_fetch_array($query);
$name = $deskRow['name'];
$description = $deskRow['description'];
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $name?></title>
<link rel="stylesheet" href="assets/css/stylemenu.css"/>
<link rel="stylesheet" href="assets/css/stylemagazin.css"/>
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
<section id="banner">
<hr>
<h1><a id="logo"><?php echo $name?></a></h1>
<p><?php echo $description?></p>
<hr>
		<h2><a>Изданные игры</a></h2>
</section>
<div class="container">
<div class="exclusive">
<div class="polozenie">
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$connect->set_charset("utf8mb4"); // задаем кодировку

$result = $connect->query("SELECT * FROM `game` where publisher = '$id'"); // запрос на выборку
while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
{	
	echo'<div class="game">';
	echo'<a href="game.php? id='.$row['id'].'" class="image"><img src="assets/images/poster/'.$row['poster'].'" alt="" /></a>';
	echo'<header>';
	echo'<h3 ><a href="game.php? id='.$row['id'].'">'.$row['name'].'</a></h3>';
	echo'</header>';
	echo'<p>Цена:'.$row['price'].'</p>';
	
	$identifier = $row['identifier'];
	$res = mysqli_query($connect, "SELECT * FROM keyspisok WHERE identifier='".$identifier."'");
	$num_rows = mysqli_num_rows($res);
	if($num_rows == 0){
		
	echo'<td><form action="vendor/not_key.php? id='.$row['id'].'">
	<button  class="btn_2">Ключ отсутвует</button>
	</form></td>';
	echo'</div>';
	}
	else{
		
	echo'<td><form method="POST" action="vendor/add_cart.php? id='.$row['id'].'">
	<button  class="btn_2">В корзину</button>
	</form></td>';
	echo'</div>';}
}
?>
</div>
</div>
</div>
</body>
</html>

