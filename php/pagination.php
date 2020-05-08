<?php 
#connect to the database
$connection = new mysqli("localhost","root","","guestbook");
	if (!$connection) {
		die('Could not connect: ' . mysqli_error());
	}
$recordPerPage=4;
$currentPage=1;
$output='';
#get the page on which the user wants to get ftom post
if(isset($_POST["page"])){
		$currentPage=$_POST["page"];
}
#get the correponding 4 rows from the table
$start=($currentPage-1)*$recordPerPage;
$result= $connection -> query("SELECT * FROM comments ORDER BY author,title LIMIT ".$start.",".$recordPerPage);
#return the rows as a html table
$output .= "<table class='showTable'>
";
#add a rows to the table
while($row = $result ->fetch_assoc()){
	$output .= '<tr class="row"  id="'.$row['authorID'].'">
	<th>' .$row['author']. '</th>
	<td>' .$row['title']. '</td>
	<td>' .$row['comment']. '</td>
	<td>' .$row['date']. '</td>
	</tr>';
}
$output .= '</table><br /><div align="center">';
#get the total number of records from the database
$res = $connection -> query("SELECT COUNT(*) FROM comments");
$totalRecords = $res -> fetch_array(MYSQLI_NUM);
#get the number of page labels we will need for displaying 4 rows at a time
define('totalPages',ceil($totalRecords[0]/$recordPerPage));
#make the labels
for($i=1; $i <=totalPages; $i++){
	$output.='<span class="paginationLabel" id="'.$i.'">'.$i.'</span>';
}
$output .= '</div>';
#close the connection to the database
$connection -> close();
#return the table and the labels 
echo $output;

?>