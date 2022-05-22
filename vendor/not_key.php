	
<?php
session_start();
$_SESSION['message_key'] = 'Ключ отсутствует!';

    header('Location:../magazin.php');
?>