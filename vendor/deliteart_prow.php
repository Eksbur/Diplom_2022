<?php

    session_start();
    require_once 'connect.php';
	$id_articles = $_GET['id'];
	
        mysqli_query($connect, "DELETE FROM komment_articles WHERE id_articles = '$id_articles'");
		
		mysqli_query($connect, "DELETE FROM articles WHERE id = '$id_articles'");
		
        $_SESSION['message'] = 'Удаление статьи прошло успешно!';
        header('Location: ../blog/blog_prow.php');



?>
