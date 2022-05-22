<?php

    session_start();
    require_once 'connect.php';
	$id = $_POST['id'];
	
        mysqli_query($connect, "DELETE FROM korzina WHERE id = '$id' and id_user = '".$_SESSION['user']['id']."'");
		
		
        header('Location: ../cart.php');



?>
