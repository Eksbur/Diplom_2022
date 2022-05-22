<?php

    session_start();
    require_once 'connect.php';
	$id_user = $_SESSION['user']['id'];
	$login_user = $_SESSION['user']['login'];
    $name = $_POST['name'];
	$description = $_POST['description'];
	$text = $_POST['text'];
	
	// проверям name
    $query = mysqli_query($connect, "SELECT id FROM articles WHERE name='".mysqli_real_escape_string($connect, $_POST['name'])."'");
    if(mysqli_num_rows($query) > 0)
    {
            $_SESSION['message_blog'] = 'Статья с таким названием уже существует';
            header('Location: ../blog/blogform.php');
    }
	else{

        $path = 'assets/images/blogposter/' . time() . $_FILES['poster']['name'];
        if (!move_uploaded_file($_FILES['poster']['tmp_name'], '../' . $path)) {
            $_SESSION['message_blog'] = 'Ошибка при загрузке сообщения';
            header('Location: ../blog/blogform.php');
        }

        mysqli_query($connect, "INSERT INTO `articles` (`id`, `name`, `description`, `poster`, `text`, `id_user`, `login_user`) VALUES (NULL, '$name', '$description', '$path', '$text', '$id_user', '$login_user')");
		
        $_SESSION['name'] =  $name;
        $_SESSION['message_blog'] = 'Статья успешно написана! Публикация произойдет после модерации.';
        header('Location: ../blog/blog.php');


    }

?>
