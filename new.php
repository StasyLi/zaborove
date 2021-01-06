<?php

function handle_error($user_error_message, $system_error_message) {die ($user_error_message . " " . $system_error_message);};
$pic_place = "u-images/";
$image_fildname = "pict";

$php_errors = array 
(1 => 'Превышен размер файла, указ. в php.ini',
2 => 'Превышен размер файла, указ. в html-ке',
3 => 'Только часть файла отправилась',
4 => 'Ну-ка выбирай фоточку для отправки');

//Проверяем на ошибки при отправке
$_FILES[$image_fildname]['error'] == 0 or handle_error ("Возникли проблемки<br>" , $php_errors[$_FILES[$image_fildname]['error']]);

@getimagesize($_FILES[$image_fildname]['tmp_name'])
or handle_error("<p> Вы выбрали файл, который не является изображением<br>", $_FILES[$image_fildname]['tmp_name'] ." не является изображением");

$now = time();
while (file_exists($upload_filename = $pic_place . $now . '-' . $_FILES[$image_fildname]['name'])) {
$now++;
}
echo $upload_filename;

@move_uploaded_file($_FILES[$image_fildname]['tmp-name'], $upload_filename) or handle_error(" возникла проблема при сохранении вашего изображение в его постоянном месте. <br>",
"Ошибка, связанная с правами доступа при перемещении файла в {$upload_filename}");

 

$link = mysqli_connect("127.0.0.1", "root", "pas4root", "zaborove");
mysqli_select_db($link, "zaborove") or die ("<p>Database selection error: ".mysqli_error()."</p>");
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$feedback = $_REQUEST['feedback'];
$query = "INSERT INTO feedbacks (Name, Email, Feedback, Photo) VALUES('{$name}', '{$email}', '{$feedback}', '{$upload_filename}');";
mysqli_query($link, $query);

?>
