<?php

    session_start();
    require_once 'connect.php';
	$id_articles = $_GET['id'];
	
	$id_user = $_SESSION['user']['id'];
	$login_user = $_SESSION['user']['login'];
	$avatar = $_SESSION['user']['avatar'];
	
    $komment = $_POST['komment'];
	

        mysqli_query($connect, "INSERT INTO `komment_articles` (`id`, `id_articles`, `id_user`, `login_user`, `komment`, `avatar` ) VALUES (NULL, '$id_articles', '$id_user', '$login_user', '$komment', '$avatar')");
		
        $_SESSION['name'] =  $name;
        $_SESSION['message'] = 'Добавлении статьи прошло успешно!';
        header('Location: ../blog/article.php? id='.$id_articles.'');



?>
