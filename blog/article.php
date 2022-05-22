
<?php
session_start();
require_once '../vendor/connect.php';
$id2=$_GET['id'];

$query = mysqli_query($connect, "SELECT * FROM articles WHERE id = '$id2'");
$deskRow = mysqli_fetch_array($query);
$title = $deskRow['name'];
$login_user = $deskRow['login_user'];
$text = $deskRow['text'];
 $text = nl2br($text);
$poster = $deskRow['poster'];
$id_user = $deskRow['id_user'];


$result = $connect->query("SELECT * FROM users WHERE id='".$_SESSION['user']['id']."'"); 
$row = $result->fetch_assoc(); 
$rol = $row['rol'];
?>
<html>
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title><?php echo $title?></title>
<link rel='stylesheet' href='../assets/css/stylemenu.css'/>
<link rel='stylesheet' href='../assets/css/styletext.css'/>
</head>
<body id='body'>
		<div class='fon1'>
    <input type='checkbox' id='nav-toggle' hidden>
    <nav class='nav'>

        <label for='nav-toggle' class='nav-toggle' onclick></label>
        <h2 class='logo'> 
            <a href='../../index.php'>Копьютерные игры</a> 
        </h2>
        <ul>
            <li><a href='../index.php'>Главная</a>
			<hr>
            <li><a href='../magazin.php'>Магазин</a>
			<hr>
            <li><a href='blog.php'>Блог</a>
			<hr>
            <li><a href='../kabinet.php'>Личный кабинет</a>
			<hr>
            <li><a href='#5'>Справочник</a>
			<hr>
            <li><a href='#6'>О нас</a>
			<hr>
        </ul>
    </nav>
	</div>
<section class='container'>
<div class='banner'>
<div class='fon2'>
<a class="btn_2" href="blog.php" >Назад</a>
</div>
<div class='fon1'>
<div class="image">
 <img src="../<?= $poster ?>" width="400" alt="">
</div>
<h3><?php echo $title?></h3>
<?php echo'<h2>Автор: '.$login_user.'</h2>';?>
<p><?php echo $text?></p>


 <?php
if (isset($_SESSION['user']))
{
	if($id_user == $_SESSION['user']['id'] or $rol ==2){ 
?> 
  <hr>
   <h2>Панель управления</h2>
  <?php
  
	echo'<td><form method="POST" action="articleredac.php? id='.$id2.'">
	<button  class="btn_3">Изменить</button>
	</form></td>';

	echo'<td><form method="POST" action="../vendor/deliteart.php? id='.$id2.'">
	<button  class="btn_3">Удалить</button>
</form></td>';
}
	else{}
}
	else{}
?> 
 <hr>
 <h3>Комментарии</h3>
<h2>Оставить комментарий</h2>
 <?php
if (isset($_SESSION['user']))
{
?> 	
<div class="polozenie">
<div class="img">
<img src="../<?= $_SESSION['user']['avatar'] ?>" class="round" alt="">
</div>
 <?php
	echo'<td><form method="POST" action="../vendor/addkomm.php? id='.$id2.'">';
	echo'<input name="komment" type="text" required>
	<button  class="btn_2">Отправить</button>
	</form></td>';
	echo'</div>';
}
else {
echo'<h2>Только зарагестрированные пользоваели могут осталять комментирии</h2>';}
	?> 
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$connect->set_charset("utf8mb4"); // задаем кодировку

$result = $connect->query("SELECT * FROM komment_articles WHERE id_articles = '$id2'"); // запрос на выборку
while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
{		
	echo'<hr>';
	echo'<img src="../'.$row['avatar'].'" class="round2" alt="" />';	
	echo'<h6>'.$row['login_user'].'</h6>';
	echo'<h5>'.$row['komment'].'</h5>';
	echo'<h5>'.$row['date_added'].'</h5>';
	if (isset($_SESSION['user']))
{
    
		if($row['id_user'] == $_SESSION['user']['id']) 
		echo'<form method="POST" action="../vendor/dell_komm.php? id='.$row['id'].'">
		<button  class="btn_2">Удалить</button>
		</form>';
		else{}
}
else{}

}
?>
</div>
</div>


</section>
</body>
</html>