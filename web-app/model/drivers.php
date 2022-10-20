<?php
function addDriver($first_name, $last_name, $gender, $email, $password,$phone, $location, $license, $status){
	global $link;
	$addDriver 	=	mysqli_query($link, 'INSERT INTO drivers SET firstname = "'.$first_name.'", lastname = "'.$last_name.'", email = "'.$email.'",password = "'.$password.'", gender = "'.$gender.'", location = "'.$location.'",  phone_number = "'.$phone.'", license = "'.$license.'", status = "'.$status.'", created_at = '.time());
	if(mysqli_affected_rows($link) == 0)
		return true;
	else
		return false;
}

function editDriver($first_name, $last_name, $gender, $email, $phone, $location, $license, $status, $id){
	global $link;
	$editDriver 	=	mysqli_query($link, 'UPDATE drivers SET firstname = "'.$first_name.'", lastname = "'.$last_name.'", email = "'.$email.'", gender = "'.$gender.'", location = "'.$location.'",  phone_number = "'.$phone.'", license = "'.$license.'", status = "'.$status.'" WHERE id = '.$id);
	if(mysqli_affected_rows($link) == 0)
		return true;
	else
		return false;
}

function allDrivers(){
	global $link;
	$allDrivers 	=	mysqli_query($link, 'SELECT * FROM drivers WHERE 1 ORDER BY id DESC');
	return $allDrivers;
}

function getDriverInfo($id){
	global $link;
	$driverInfo 	=	mysqli_query($link, 'SELECT * FROM drivers WHERE id = '.$id);
	return $driverInfo;
}

function deleteDriver($id){
	global $link;
	mysqli_query($link, 'DELETE FROM drivers WHERE id = '.$id);
	return true;
}
?>