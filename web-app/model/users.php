<?php
function add_user($first_name, $last_name, $phone_number, $email){
	global $link;
	$sql	=	mysqli_query($link, 'INSERT INTO users SET first_name = "'.$first_name.'", last_name = "'.$last_name.'", phone_number = "'.$phone_number.'", email = "'.$email.'", password = "'.sha1('password').'", created_at = '.time()) OR die(mysqli_error($link));
	if(mysqli_affected_rows($link) == 0)
		return false;
	else
		return mysqli_insert_id($link);
}

function createUserAccount($user){
	global $link;
	if(mysqli_query($link, 'INSERT INTO accounts SET user_id = '.$user.', balance = 0, last_update = '.time()))
		return true;
	else
		return false;
}

function getUserInfo($user_id){
	global $link;
	$sql	=	mysqli_query($link, 'SELECT * FROM users WHERE id = '.$user_id);
	return $sql;
}

function edit_user($first_name, $last_name, $phone_number, $email, $user_id){
	global $link;
	$sql	=	mysqli_query($link, 'UPDATE users SET first_name = "'.$first_name.'", last_name = "'.$last_name.'", phone_number = "'.$phone_number.'", email = "'.$email.'" WHERE id = '.$user_id);
	if(mysqli_affected_rows($link) == 0)
		return false;
	else
		return true;
}

function delete_user($user_id){
	global $link;
	$sql	=	mysqli_query($link, 'DELETE FROM users WHERE id = '.$user_id);
	return true;
}

function getAllUsers(){
	global $link;
	$sql	=	mysqli_query($link, 'SELECT * FROM users WHERE 1 ORDER BY first_name ASC, last_name ASC') OR die(mysqli_error($link));
	return $sql;
}

function getAllDepartments(){
	global $link;
	$sql	=	mysqli_query($link, 'SELECT * FROM departments ORDER BY name ASC');
	return $sql;
}

function change_password($password, $user){
	global $link;
	$sql	=	mysqli_query($link, 'UPDATE users SET password = "'.$password.'" WHERE id = '.$user);
	return true;
}

function getUserBalance($user){
	global $link;
	$balance 	=	mysqli_query($link, 'SELECT balance FROM accounts WHERE user_id = '.$user);
	$result		=	mysqli_fetch_assoc($balance);
	return $result['balance'];
}

function rechargeAccount($new_balance, $user_id){
	global $link;
	$recharge 	=	mysqli_query($link, 'UPDATE accounts SET balance = '.$new_balance.', last_update = '.time().' WHERE user_id = '.$user_id);
	return true;
}

function getUserRequests($user_id){
	global $link;
	$requests 	=	mysqli_query($link, 'SELECT * FROM requests WHERE user_id = '.$user_id);
	return $requests;
}

function getUserTrips($user_id){
	global $link;
	$trips 	=	mysqli_query($link, 'SELECT * FROM trips INNER JOIN requests ON trips.request_id = requests.id WHERE user_id = '.$user_id);
	return $trips;
}
?>