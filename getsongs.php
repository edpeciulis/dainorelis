<?php
// This is where you connect to your song database.  
// You'll have to set up your own, but I've included
// a snapshot of the current song database in the file dainorelis.sql
require_once( dirname(dirname(dirname(__FILE__))) . '/common/inc/connecttodainorelis.php'); 

$sql = 'select title, lyrics FROM dainos
		ORDER BY title';
$result = mysqli_query($link, $sql);
if (!$result){die('Error fetching songs from dainos table: ' . mysqli_error($link));}
while ($row = mysqli_fetch_array($result)) 
{
	$array[] = array('title' => $row['title'], 'lyrics' => $row['lyrics']);
}
$array = 'true' . json_encode($array);
echo $array;
exit();
?>		
