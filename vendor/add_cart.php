<?php
session_start();
require_once 'connect.php';
if (!$_SESSION['user']) {
	
$_SESSION['message_key'] = 'Авторизируйтесь чтобы купить игру!';

    header('Location:../magazin.php');
}

if(!isset($_GET['id'])){
	header('Location: magazin.php');
}

$id=$_GET['id'];


$res = mysqli_query($connect, "SELECT * FROM korzina WHERE id_game='".$id."' AND id_user='".$_SESSION['user']['id']."'");
$num_rows = mysqli_num_rows($res);
if($num_rows != 0){
	
$_SESSION['message_key'] = 'Игра уже в корзине';

    header('Location:../magazin.php');
}
else
$result = $connect->query("SELECT * FROM game WHERE id='".$id."'"); // запрос на выборку

while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
{
$id_game = $row['id'];
$name = $row['name'];
$price =$row['price'];
$platform = $row['platform'];
$poster = $row['poster'];

$user = $_SESSION['login'];


 mysqli_query($connect,"INSERT INTO korzina SET id_game='".$id_game."', name='".$name."', price='".$price."', platform='".$platform."', poster='".$poster."', id_user='".$_SESSION['user']['id']."'");
 header("Location:../cart.php"); 
 exit();
}
?>