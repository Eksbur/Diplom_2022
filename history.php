<?php
session_start();
require_once 'vendor/connect.php';
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
<link rel="stylesheet" href="assets/css/style4.css" />
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
			<li><a href="cart.php">Корзина </a>
			<hr>
            <li><a href="blog/blog.php">Блог</a>
			<hr>
            <li><a href="kabinet.php">Личный кабинет</a>
			<hr>
        </ul>
    </nav>




<section class="container">
<?php

$res = mysqli_query($connect, "SELECT * FROM history WHERE id_user='".$_SESSION['user']['id']."'");
$num_rows = mysqli_num_rows($res);
if($num_rows == 0){
	
echo'<h2>Вы еще ничего не купили!</h2>';

}
else{
?>
<table border='1' style='background:#9F9F9F; box-shadow: 0px 0px 5px #000'>
<tr>
<td>Игра</td>
<td>Цена</td>
<td>Дата покупки</td>
<td>Ключ активации<td>
</tr>

<?php
if (isset($_POST['searchButton']) and $_POST['search'] !== ""){
	$queryDefault = "SELECT * FROM history WHERE game_name LIKE '%".$_POST['search']."%' or price LIKE '%".$_POST['search']."%' or purchase_date LIKE '%".$_POST['search']."%'";
}
else
$queryDefault = "SELECT * FROM history where id_user ='".$_SESSION['user']['id']."'";
$query = mysqli_query($connect, $queryDefault);
while ($data = mysqli_fetch_array($query)) {
    echo "<tr style='background:#fff'>";
	
	
	echo "<form method='POST' action='update.php'>";
    echo "<td style='box-shadow:inset 0px 0px 3px #000'>
    <input type='text' id='game_name' name='game_name' value='".$data['game_name']."'/></td>";

    echo "<td style='box-shadow:inset 0px 0px 3px #000'> 
    <input type='text' id='price' name='price' value='".$data['price']."'/></td>";
	
	 echo "<td style='box-shadow:inset 0px 0px 3px #000'>
    <input type='text' id='purchase_date' name='purchase_date' value='".$data['purchase_date']."'/></td>";
	
    echo "<td style='box-shadow:inset 0px 0px 3px #000'>
    <input type='text' id='keyname' name='keyname' value='".$data['keyname']."'/></td>";

		
    echo "</tr>";

}

?>
</table>
<?php
}

?>
<div class="banner2">
<div class="navbar">
  <a href="kabinet.php">Профиль</a>
  <a href="data.php">Личные данные</a>
  <a href="history.php" class="active">История покупок</a>
    <a href="dataart.php">Статьи</a>
</div>
</div>
</section>
</body>
</html>

