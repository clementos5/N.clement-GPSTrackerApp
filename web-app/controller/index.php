<?php
session_start();
include 'model/openConnection.php';
include 'model/index.php';
if(isset($_GET['do']))
	$action	=	htmlspecialchars($_GET['do']);
else
	$action	=	'default';

switch($action){
	case 'logout':
		session_destroy();
		header('Location:index.php');
	break;
	default:
		if(isset($_POST['login'])){
			$username	=	htmlspecialchars($_POST['username']);
			$password	=	htmlspecialchars($_POST['password']);
			$login		=	login($username, sha1($password));
			if(mysqli_num_rows($login) == 0){
				$wrong_credentials	=	true;
				include 'view/index.php';
			}
			else{
				//Keep the logged in user's info for later uses. (id, level)
				$info					=	mysqli_fetch_assoc($login);
				$_SESSION['user_id']	=	$info['id'];
				header('Location:drivers.php'); // Maybe to be changed after.
			}
		}
		else{
			if(isset($_SESSION['user_id'])){
				header('Location:drivers.php');
			}
			else{
				include 'view/index.php';
			}
		}
	break;

	case 'seed':
		$seed_users = seed_admins();
		header('Location:index.php');
	break;

	case 'autoBackup':
		$hour = date('G');
		//Run the autoBackup between 22h - 23h
		//That is when the server is not being used
		if ($hour >= 10 && $hour <= 11) { 
			backup_db();
			header('Location:index.php');
		} 
	break;
}
include 'model/closeConnection.php';
?>