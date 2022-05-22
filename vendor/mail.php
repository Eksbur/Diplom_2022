<?php

$to = "eksbur@gmail.com"; 
// емайл получателя 

$subject = "Проверка отправки писем"; 
// тема письма 

$message = "Здравствуйте<br><br>Если вы это читаете значит все ок <br><br>Почтовый робот "; 
// текст сообщения, здесь вы можете вставлять таблицы, рисунки, заголовки, оформление цветом и т.п.

$mailheaders = "Content-type:text/html;charset=windows-1251rn"; 
// формат письма html

$mailheaders .= "From: SiteRobot <noreply@siterobot.ru>rn"; 
$mailheaders .= "Reply-To: noreply@siterobot.rurn"; 
// емайл отправителя и емайл для ответа 

mail($to, $subject, $message, $mailheaders);
// отправляем письмо 

?>