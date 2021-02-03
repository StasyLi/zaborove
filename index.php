<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><!--it's said about windows-1251-->
<link rel="stylesheet" href="style.css">
<TITLE>Форма</title>
</head>
<body>

<p align="center"><h1>Form for feedbacks</h1>
<form action ="send.php" method="post" name="forma" enctype="multipart/form-data">

<fieldset>
<label for="name">Your name</label>
<input name="name" type="text" placeholder="John" size="30">
</fieldset>

<fieldset>
<label for="email">Your e-mail</label>
<input name="email" type="text" placeholder="myemail@gmail.ru" size="30">
</fieldset>

<fieldset>
<label for="feedback">Your feedback</label>
<input name="feedback" type="text" placeholder="Enter your feelings..." size="30">
</fieldset>

<fieldset>
<input type="hidden" name="MAX_FILE_SIZE" value = "20000000">
<label for="pict">Your photo</label>
<input type="file" name="pict">
</fieldset>

<fieldset>
<input name="knopka" id="button" type="submit" value="Send feedback">
</fieldset>

</form>

<?php

if (isset($_POST['knopka'])) {
print ("hi Katia");
}

$link = mysqli_connect("127.0.0.1", "root", "pas4root", "zaborove");
$req = "SELECT Name, Feedback FROM feedbacks";
$response = mysqli_query($link, $req);
while ($row = mysqli_fetch_array($response)){
print("Name: " . $row['Name'] . ";<br>Feelings: " . $row['Feedback'] . "<br>");
}


?>
</body>
</html>
