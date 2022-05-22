<?php

    session_start();
    require_once 'connect.php';

    $id = $_SESSION['user']['id'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
	
    if ($password === $password_confirm) {

        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['message'] = 'Ошибка при загрузке сообщения';
            header('Location: ../register.php');
        }

        $password = md5($password);

        mysqli_query($connect, "INSERT INTO `users` (` `avatar`) VALUES ('$path') where id = '$id'");

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../login.php');


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }

?>
