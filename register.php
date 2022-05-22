<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: profile.php');
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/stylemenu.css"/>
	<link rel="stylesheet" href="assets/css/stylefon.css"/>
</head>
<body>
<body>

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
			<li><a href="../cart.php">Корзина   <?php 
 if(isset($_SESSION['login']))
 {
  $user = $_SESSION['login']; 
  $link = mysqli_connect("localhost", "root","", "18074");
  $result = mysqli_query($link, "SELECT * FROM korzina WHERE user_login='".$user."'");
  $num_rows = mysqli_num_rows($result);
  echo "$num_rows";
 }
  ?></a>
			<hr>
            <li><a href="../blog/blog.php">Блог</a>
			<hr>
            <li><a href="../kabinet.php">Личный кабинет</a>
			<hr>
<?php
 if(isset($_SESSION['login']))
 {
$mysqli= mysqli_connect("localhost", "root","", "18074");
$user = $_SESSION['login'];
$result = $mysqli->query("SELECT * FROM users WHERE user_login='".$user."'"); 
$row = $result->fetch_assoc(); 
$userrole = $row['user_role'];
$role = 2;
 if($role == $userrole)
 {
	 echo'<hr>';
	echo '<li><a href="../admin/user.php">Пользователи</a>';
	echo'<hr>';
	echo '<li><a href="../admin/key/key.php">Ключи</a>';
	echo'<hr>';
	echo '<li><a href="../admin/game/game.php">Игры</a>';
	echo'<hr>';
}
else{
}
}
?>
        </ul>
    </nav>
    <!-- Форма регистрации -->

    <form action="vendor/signup.php" method="post" enctype="multipart/form-data">
		<h5>Регистрация</h5>
        <h2>Логин</h2>
        <input type="text" name="login" placeholder="Введите свой логин" required>
        <h2>Почта</h2>
        <input type="email" name="email" placeholder="Введите адрес своей почты" required>
        <h2>Изображение профиля</h2>
        <input type="file" name="avatar" required>
        <h2>Пароль</h2>
        <input type="password" name="password" placeholder="Введите пароль" required>
        <h2>Подтверждение пароля</h2>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль" required>
        <button type="submit">Войти</button>
	    <hr>
        <p>
            У вас есть аккаунта? 
        </p>
		<p><a href="login.php">авторизируйтесь</a></p>
        <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>