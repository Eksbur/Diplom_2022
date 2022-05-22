<?php

    session_start();
    require_once 'connect.php';
	$id = $_GET['id'];
$result = $connect->query("SELECT * FROM komment_articles WHERE id='".$id."'"); 
$row = $result->fetch_assoc(); 
$art = $row['id_articles'];

        mysqli_query($connect, "DELETE FROM komment_articles WHERE id = '$id'");
		
		
        header('Location: ../blog/article.php? id='.$art.'');



?>
