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
SET checks = 1 WHERE id = '".$id_articles."'") 

or die (mysqli_error($connect));

        $_SESSION['message_blog_prow'] = 'Публикация статьи прошла успешно!';
        header('Location: ../blog/blog_prow.php');
?>
</body>

</html>
