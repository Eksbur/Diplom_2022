<html>
<head>

</head>
<body>
<?php
session_start();
require_once 'connect.php';
$id = $_SESSION['user']['id'];
$email = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
	// проверям email
	$query = mysqli_query($connect, "SELECT id FROM users WHERE email='".mysqli_real_escape_string($connect, $_POST['email'])."'");
    if(mysqli_num_rows($query) > 0)
    {
            $_SESSION['message'] = 'Пользователь с таким email уже существует';
            header('Location: ../data.php');
    }
	else{
    if ($password === $password_confirm) {
		
$query = mysqli_query($connect, 
"UPDATE users 
SET email = '".$_POST['email']."'
WHERE id = '".$id."'") 

or die (mysqli_error($connect));


        $_SESSION['message'] = 'Смена электронной почты прошла успешно! Автроризируйтесь';
		unset($_SESSION['user']);
        header('Location: ../login.php');
    } 
	
	
	
	
else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../data.php');
    }
	}
?>
</body>

</html>