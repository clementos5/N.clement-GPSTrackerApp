<?php
$host	=	'localhost';
$user	=	'root';
$pwd	=	'';
$db		=	'tebuka';
$link 	=	mysqli_connect($host, $user, $pwd, $db);
function getUserNames($id){
	global $link;
	$userNames 	= 	mysqli_query($link, 'SELECT username FROM admin WHERE id = '.$id);
	$result 	=	mysqli_fetch_assoc($userNames);
	return $result['username'];
}
?>
