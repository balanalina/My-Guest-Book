<?php 
#connect to the database
$connection = new mysqli("localhost","root","","guestbook");
	if (!$connection) {
		die('Could not connect: ' . mysqli_error());
	}
#get the id of the comment to be deleted from post function
$id = $_POST['id'];
#delete the comment
$connection -> query("DELETE FROM comments WHERE authorID=$id");
#check if it was deleted
if($connection -> query("SELECT * FROM comments WHERE authorID=$id")->num_rows == 0)
	echo "<p>Comment deleted!</p>";
#close conncetion
$connection ->close();
?>