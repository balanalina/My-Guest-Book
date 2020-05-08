<?php 
#connect to the database
$connection = new mysqli("localhost","root","","guestbook");
	if (!$connection) {
		die('Could not connect: ' . mysqli_error());
	}
#get the data for update froom the post function
$id = $_POST['id'];
$mail = $_POST['newMail'];
$title = $_POST['newTitle'];
$comment = $_POST['newComment'];
#the date will be updated with the date of the modification
$date = date('Y-m-d');
#update the comment
$connection -> query("UPDATE comments SET author='$mail', title='$title',comment='$comment' WHERE authorid=$id");
echo "<p>Comment Updated!</p>";
#close the connection
$connection -> close();
?>