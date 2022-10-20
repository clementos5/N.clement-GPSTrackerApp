<?php
function login($username, $password){
	global $link;
	$admin	=	mysqli_query($link, 'SELECT * FROM admin WHERE username = "'.$username.'" AND password = "'.$password.'"');
	return $admin;
}

function isAdminTableEmpty(){
	global $link;
	$admins 	=	mysqli_query($link, 'SELECT COUNT(*) AS nbr_of_admins FROM admin');
	$result		=	mysqli_fetch_assoc($admins);
	if($result['nbr_of_admins'] == 0)
		return true;
	else
		return false;
}

function seed_admins(){
	global $link;
	$user1	=	mysqli_query($link, 'INSERT INTO `admin` SET username = "Clement", password = "'.SHA1("clement").'"');
	$user2	=	mysqli_query($link, 'INSERT INTO `admin` SET username = "Emmanuel", password = "'.SHA1("emmanuel").'"');
	$user3	=	mysqli_query($link, 'INSERT INTO `admin` SET username = "Adrien", password = "'.SHA1("adrien").'"');
	return true;
}
?>