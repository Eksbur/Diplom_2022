
<?php
session_start();
require_once '../vendor/connect.php';
$id2=$_GET['id'];

$query = mysqli_query($connect, "SELECT * FROM articles WHERE id = '$id2'");
$deskRow = mysqli_fetch_array($query);
$title = $deskRow['name'];
$description = $deskRow['description'];
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
      <h5>Редактирование статьи</h5>
<?php
echo'<td><form method="POST" action="../vendor/redack.php? id='.$id2.'">';
echo "<input type='text' id='title' name='title' value='".$title."'/></td>";
echo "<input type='text' id='description' name='description' value='".$description."'/></td>";
echo "<textarea id='text' name='text' required>".$text."</textarea></td>";
echo'	<input name="submit" type="submit" value="Загрузить">';
echo'</form></td>';
echo'</div>';
?> 

    </div>
	

	
  </section>
</body>
</html>