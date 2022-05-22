	
<?php
session_start();
$_SESSION['message_key'] = 'Игра уже в корзине!';

    header('Location:../magazin.php');
?>