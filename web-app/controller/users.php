<?php
session_start();
if(!isset($_SESSION['user_id']))
	header('Location:index.php');
include 'model/openConnection.php';
include 'model/users.php';
if(isset($_GET['do'])){
	$action	=	htmlspecialchars($_GET['do']);
}
else{
	$action	=	'default';
}
switch($action){
	case 'add_user':
		if(isset($_POST['add_user'])){
			$first_name		=	htmlspecialchars($_POST['first_name']);
			$last_name		=	htmlspecialchars($_POST['last_name']);
			$phone_number	=	htmlspecialchars($_POST['phone_number']);
			$email			=	htmlspecialchars($_POST['email']);
			$add_user		=	add_user($first_name, $last_name, $phone_number, $email);
			if($add_user){
				$user_added		=	true;
				//Create a user's financial account.
				$user_account	=	createUserAccount($add_user);
			}
			include 'view/users.php';
		}
		else
			include 'view/users.php';
	break;

	case 'edit_user':
		if(isset($_GET['user'])){
			$user_id 		=	(int)$_GET['user'];
			$getUserInfo	=	getUserInfo($user_id);
			$user 			=	mysqli_fetch_assoc($getUserInfo);
			if(isset($_POST['edit_user'])){
				$first_name		=	htmlspecialchars($_POST['first_name']);
				$last_name		=	htmlspecialchars($_POST['last_name']);
				$phone_number	=	htmlspecialchars($_POST['phone_number']);
				$email			=	htmlspecialchars($_POST['email']);
				$edit_user		=	edit_user($first_name, $last_name, $phone_number, $email, $user_id);
				header('Location:users.php');
			}
			else
				include 'view/users.php';
			}
		else
			header('Location:users.php');
	break;

	case 'delete_user':
		if(isset($_GET['user'])){
			$user_id		=	(int)$_GET['user'];
			//Delete this user forever.
			$delete_user	=	delete_user($user_id);
			header('Location:users.php');
		}
		else
			header('Location:users.php');
	break;

	case 'profile':
		if(isset($_GET['user'])){
			$user_id		=	(int)$_GET['user'];
			$getUserInfo	=	getUserInfo($user_id);
			$user 			=	mysqli_fetch_assoc($getUserInfo);
			include 'view/users.php';
		}
		else
			header('Location:users.php');
	break;

	case 'recharge':
		if(isset($_POST['recharge'])){
			$user_id 			=	intval($_POST['_user']);
			$current_balance 	=	getUserBalance($user_id);
			$amount_to_recharge	=	intval($_POST['amount']);
			$new_balance 		=	$current_balance + $amount_to_recharge;
			$rechargeAccount	=	rechargeAccount($new_balance, $user_id);
		}
		header('Location:users.php');
	break;

	case 'requests':
		if(isset($_GET['user'])){
			$user_id		=	(int)$_GET['user'];
			$requests 		=	getUserRequests($user_id);
			if(mysqli_num_rows($requests) == 0)
				$no_request	=	true;
			else
				$no_request	=	false;
			include 'view/users.php';
		}
		else
			header('Location:users.php');
	break;

	case 'trips':
		if(isset($_GET['user'])){
			$user_id	=	(int)$_GET['user'];
			$trips 		=	getUserTrips($user_id);
			if(mysqli_num_rows($trips) == 0)
				$no_trip	=	true;
			else
				$no_trip	=	false;
			include 'view/users.php';
		}
		else
			header('Location:users.php');
	break;

	default:
		//List all system users admins and standard users ordered alphabetically
		$getAllUsers	=	getAllUsers();
		if(mysqli_num_rows($getAllUsers) == 0)
			$no_user	=	true;
		else
			$no_user	=	false;
		include 'view/users.php';
	break;
}
include 'model/closeConnection.php';
?>