<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><!--it's said about windows-1251-->
<link rel="stylesheet" href="style.css">
<TITLE>Форма</title>
</head>
<body>

<?php

$link = mysqli_connect("127.0.0.1", "root", "pas4root", "zaborove");
if ($link==false) {
print("OH GOD! We've got a problem with link <br>");
}
if ($link!=false) {
print("Everything's alright with link <br>");
}
$uploaddir = '/scripts/u-images/';
$uploadfile = $uploaddir . basename($_FILES['pict']['name']);

define ('SITE_ROOT', realpath(dirname(__FILE__)));
//move_uploaded_file($_FILES['file']['tmp_name'], SITE_ROOT.'scripts/u-images/');

//move_uploaded_file($_FILES['pict']['tmp_name'],  "$uploadfile") - that was in if construction


if (move_uploaded_file($_FILES['pict']['tmp_name'], "$uploaddir")) {
echo ("The uploading of our admirable file ended successfully!!!!<br>");
} else {
echo ("Oh no! :/ THere's an error with uploading.<br>");
}


$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

$query = "INSERT INTO feedbacks (Name, Email, Feedback, Photo) VALUES ('{$name}', '{$email}', '{$feedback}', 'address-for-photo');";
$result = mysqli_query($link, $query);

if ($result == false) {
print ("There is an error with inserting our perfect data<br>");
};
if ($result == true) {
print ("Yaho! The request was sent<br>");
}

$req = "SELECT Name, Feedback FROM feedbacks";
$response = mysqli_query($link, $req);
while ($row = mysqli_fetch_array($response)){
print("Name: " . $row['Name'] . ";<br>Feelings: " . $row['Feedback'] . "<br>");
}


//for redirect
//header('Location: index.html');

?>

<p align="center"><h1>Form for feedbacks</h1>
<form method="post" name="forma" enctype="multipart/form-data">

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
<input id="button" type="submit" value="Send feedback">
</fieldset>

</form>

</body>
</html>
