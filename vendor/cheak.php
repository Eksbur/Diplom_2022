	
<?php
session_start();
require_once 'connect.php';
$user = $_SESSION['user']['id'];
$result = $connect->query("SELECT * FROM users WHERE id='".$user."'"); 
$row = $result->fetch_assoc(); 
$kosh = $row['checks'];
$poppol = ($_POST['balanse']);
$spisanie = ($kosh + $poppol);
mysqli_query($connect,"UPDATE users SET checks='".$spisanie."' WHERE id='".$user."'"); 
$_SESSION['name'] =  $name;
$_SESSION['message'] = 'Кошелек успешно пеополнен!';
header('Location:../balanse.php');
?>