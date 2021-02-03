<?php

require ('name.php');
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


if (move_uploaded_file($_FILES['pict']['tmp_name'], $uploaddir)) {
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

echo '<meta http-equiv="refresh" content="0; url=index.php">';
print ("Yaho! The request was sent<br>");

}



?>
