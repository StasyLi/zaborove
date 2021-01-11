<?php

$link = mysqli_connect("127.0.0.1", "root", "pas4root", "zaborove");
if ($link==false) {
print("OH GOD! We've got a problem with link");
}
if ($link!=false) {
print("Everything's alright with link <br>");
}


/*
mysqli_select_db($link, "zaborove");
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$feedback = $_REQUEST['feedback'];
*/

$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

$query = "INSERT INTO feedbacks (Name, Email, Feedback, Photo) VALUES ('{$name}', '{$email}', '{$feedback}', 'address-for-photo');";
$result = mysqli_query($link, $query);

if ($result == false) {
print ("There is an error with inserting our perfect data");
};
if ($result == true) {
print ("Yaho! The request was sent");
}

?>
