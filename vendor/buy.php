<?php
session_start();
require_once 'connect.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках

	$user = $_SESSION['user']['id'];
	$id=$_GET['id'];
//получение email
$result = $connect->query("SELECT * FROM users WHERE id='".$user."'"); 
$row = $result->fetch_assoc(); 
$email = $row['email'];

//получаем общую сумму заказа
$result = $connect->query("SELECT SUM(price) AS price FROM korzina WHERE id_user='".$user."'"); 
$row = $result->fetch_assoc(); 
$sum = $row['price'];

//подсчет строк
$result = $connect->query("SELECT count(*) FROM korzina WHERE id_user='".$user."'");
$row = $result->fetch_row();
$count = $row[0];




$i=0;
$result = $connect->query("SELECT *  From korzina WHERE id_user='".$user."'");
while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
{	
  if ($i > $count)
	   header("Location:../cart.php"); 
   else

		$id_game = $row['id_game'];
		$name = $row['name'];
		$price = $row['price'];
		$platform = $row['platform'];
		$poster = $row['poster'];	

		
		$res = $connect->query("SELECT * FROM game WHERE id='".$id_game."'"); 
		$row = $res->fetch_assoc(); 
		$identifier = $row['identifier'];
		
		
		$res = $connect->query("SELECT * FROM game WHERE id='".$id_game."'"); 
		$row = $res->fetch_assoc(); 
		$identifier = $row['identifier'];
		
		
		$query = mysqli_query($connect, "SELECT * FROM keyspisok WHERE identifier='".$identifier."' ORDER BY RAND() LIMIT 1");
		$row = mysqli_fetch_array($query);
		$keyname = $row['keyname'];
		
		
		 mysqli_query($connect,"INSERT INTO history SET keyname='".$keyname."', id_user='".$user."', game_name='".$name."', price='".$price."', platform='".$platform."', poster='".$poster."'");
		 mysqli_query($connect,"DELETE FROM korzina WHERE id='".$id."'");
		 mysqli_query($connect,"DELETE FROM keyspisok WHERE keyname='".$keyname."'");
		 ++$i;
}


$result = $connect->query("SELECT * FROM users WHERE id='".$user."'"); 
$row = $result->fetch_assoc(); 
$check = $row['checks'];
$spisanie = ($check - $sum);
mysqli_query($connect,"UPDATE users SET checks='".$spisanie."' WHERE id='".$user."'"); 

        $_SESSION['message_buy'] = 'Покупка прошла успешно! Игры добавлены в вашу историю покупок.';
	   header("Location:../cart_buy.php"); 
?>