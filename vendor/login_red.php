<html>
<head>

</head>
<body>
<?php
session_start();
require_once 'connect.php';
$id = $_SESSION['user']['id'];
$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];



    $query = mysqli_query($connect, "SELECT id FROM users WHERE login='".mysqli_real_escape_string($connect, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
            $_SESSION['message'] = 'Пользователь с таким логином уже существует';
            header('Location: ../data.php');
    }
	else{
    if ($password === $password_confirm) {
		
$query = mysqli_query($connect, 
"UPDATE users 
SET login = '".$_POST['login']."'
WHERE id = '".$id."'") 

or die (mysqli_error($connect));


        $_SESSION['message'] = 'Смена логина прошла успешно! Автроризируйтесь';
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
