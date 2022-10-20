<?php
session_start();
if(!isset($_SESSION['user_id']))
	header('Location:index.php');
include 'model/openConnection.php';
include 'model/drivers.php';
if(isset($_GET['do']))
	$action = htmlspecialchars($_GET['do']);
else
	$action = "default";

switch($action){
	case 'add_driver':
		if(isset($_POST['add_driver'])){
			$first_name =	htmlspecialchars($_POST['first_name']);
			$last_name	=	htmlspecialchars($_POST['last_name']);
			$gender		=	htmlspecialchars($_POST['gender']);
			$email 		=	htmlspecialchars($_POST['email']);
			$password 	=	htmlspecialchars(sha1($_POST['password']));
			$phone		=	htmlspecialchars($_POST['phone']);
			$location	=	htmlspecialchars($_POST['location']);
			$license	=	htmlspecialchars($_POST['license']);
			$status		=	htmlspecialchars($_POST['status']);
			$addDriver 	=	addDriver($first_name, $last_name, $gender, $email,$password, $phone, $location, $license, $status);
			$driverAdded=	true;
			include 'view/drivers.php';
		}
		else{
			include 'view/drivers.php';
		}
	break;

	case 'edit_driver':
		if(isset($_GET['id'])){
			$id 			=	intval($_GET['id']);
			$getDriverInfo	=	getDriverInfo($id);
			if(mysqli_num_rows($getDriverInfo) == 0){
				header('Location:drivers.php');
			}
			else{
				$get_driver		=	mysqli_fetch_array($getDriverInfo);
				//Editing the driver
				if(isset($_POST['edit_driver'])){
					$first_name =	htmlspecialchars($_POST['first_name']);
					$last_name	=	htmlspecialchars($_POST['last_name']);
					$gender		=	htmlspecialchars($_POST['gender']);
					$email 		=	htmlspecialchars($_POST['email']);
					$phone		=	htmlspecialchars($_POST['phone']);
					$location	=	htmlspecialchars($_POST['location']);
					$license	=	htmlspecialchars($_POST['license']);
					$status		=	htmlspecialchars($_POST['status']);
					$editDriver =	editDriver($first_name, $last_name, $gender, $email,$password, $phone, $location, $license, $status, $id);
					header('Location:drivers.php');
				}
				else{
					include 'view/drivers.php';
				}
			}
		}
	break;

	case 'delete_driver':
		if(isset($_GET['id']))
			deleteDriver($_GET['id']);
		header('Location:drivers.php');
	break;

	default:
		//Get all drivers
		$allDrivers		=	allDrivers();
		if(mysqli_num_rows($allDrivers) == 0)
			$no_driver	=	true;
		else
			$no_driver 	=	false;
		include 'view/drivers.php';
	break;
}
include 'model/closeConnection.php';
?>