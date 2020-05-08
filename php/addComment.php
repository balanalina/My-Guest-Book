<?php 
#connect to database
$connection = new mysqli("localhost","root","","guestbook");
if (!$connection) {
	die('Could not connect: ' . mysqli_error());
}
#take the data from post 
$author = $_POST['author'];
$title = $_POST['title'];
$comment = $_POST['comment'];
#get current date
$date = date('Y-m-d');
#add the comment
$connection -> query("INSERT INTO comments(author,title,comment,date) VALUES( '{$author}', '{$title}' , '{$comment}' , '{$date}')");
#close the connectio
$connection ->close();
?>