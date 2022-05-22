<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
	
	// проверям login
    $query = mysqli_query($connect, "SELECT id FROM users WHERE login='".mysqli_real_escape_string($connect, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
            $_SESSION['message'] = 'Пользователь с таким логином уже существует';
            header('Location: ../register.php');
    }
	else{
	// проверям email
	$query = mysqli_query($connect, "SELECT id FROM users WHERE email='".mysqli_real_escape_string($connect, $_POST['email'])."'");
    if(mysqli_num_rows($query) > 0)
    {
            $_SESSION['message'] = 'Пользователь с таким email уже существует';
            header('Location: ../register.php');
    }
	else{
	
	// проверям пароль	
    if ($password === $password_confirm) {

        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['message'] = 'Ошибка при загрузке сообщения';
            header('Location: ../register.php');
        }

        $password = md5($password);

        mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$login', '$email', '$password', '$path')");

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../login.php');


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }
	}
	}

?>
