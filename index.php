<?php
session_start();
require_once 'vendor/connect.php';
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Game</title>
<link rel="stylesheet" href="assets/css/stylemenu.css"/>
<link rel="stylesheet" href="assets/css/style.css"/>
<link rel="stylesheet" href="assets/css/stylefon.css"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
   $('a[href^="#"]').click(function () { 
     elementClick = $(this).attr("href");
     destination = $(elementClick).offset().top;
     if($.browser.safari){
       $('body').animate( { scrollTop: destination }, 1100 );
     }else{
       $('html').animate( { scrollTop: destination }, 1100 );
     }
     return false;
   });
 });
</script>
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

<header>
<h1><a href="index.php" id="logo">Компьютерные игры</a></h1>
<h3></h3>
</header>
<footer>
<a href="#banner" class="button"></a>
</footer>
<p2>Нажми чтобы начать</p2>
</div>
<section id="banner">
<header>
<h2>Здесь ты можешь ознакомится с игровыми платформами</h2>
<div id="menuznach">
<a href="#" class="image1"> </a></p>
<a href="#" class="image2"> </a></p>
<a href="#" class="image3"> </a></p>
<a href="#" class="image4"> </a></p>
</div>
<hr>
<h2>
<?php
 if(isset($_SESSION['user']))
 {
     print("Добро пожаловать");?></h2><h4><a> <?php echo $_SESSION['user']['login'];
 
?></a></h4>

<div class="img">
<img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
</div>

<?php
 }
if (isset($_SESSION['user']))
{
    if (isset($_POST['submit']))
    {
		session_start();
		session_destroy();
		header('Location:index.php');
		exit();
	}
	?>
<form method="post">
<a><input name="submit" type="submit" value="Выйти"></a>
 </form>
<?php
}
else
{
?>
<h5><a href="login.php">Войти/Зарегистрироваться</a></h5>
<?php
}
?>
</h3>
<hr>
<h5><a>Обновления магазина</a></h5>
<hr>
</header>
</section>

<div class="container">
<div class="exclusive">
<div id="fon2">
<div class="polozenie">
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$connect->set_charset("utf8mb4"); // задаем кодировку

$result = $connect->query('SELECT * FROM `game` ORDER BY date_added DESC LIMIT 4'); // запрос на выборку
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
  if($num_rows == 0)
	echo'<td><form action="vendor/not_key.php? id='.$row['id'].'">
	<button  class="btn_2">Ключ отсутвует</button>
	</form></td>';
	
	else
	echo'<td><form method="POST" action="vendor/add_cart.php? id='.$row['id'].'">
	<button  class="btn_2">В корзину</button>
	</form></td>';
	echo'</div>';
}
?>
</div>
</div>
</div>
</div>
</div>
</div>		
</body>
</html>