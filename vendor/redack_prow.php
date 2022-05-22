<html>
<head>

</head>
<body>
<?php
session_start();
require_once 'connect.php';
$id_articles = $_GET['id'];
$query = mysqli_query($connect, 
"UPDATE articles 
SET name = '".$_POST['title']."',
    description = '".$_POST['description']."',
	text = '".$_POST['text']."'
WHERE id = '".$id_articles."'") 

or die (mysqli_error($connect));

        header('Location: ../blog/article_prow.php? id='.$id_articles.'');
?>
</body>

</html>
