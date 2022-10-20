<?php
session_start();
if(!isset($_SESSION['user_id']))
	header('Location:index.php');
include 'model/openConnection.php';
include 'model/cars.php';
if(isset($_GET['do']))
	$action = htmlspecialchars($_GET['do']);
else
	$action = "default";

switch($action){
	case 'add_car':
		if(isset($_POST['add_car'])){
			$model 		=	htmlspecialchars($_POST['model']);
			$plate		=	htmlspecialchars($_POST['plate']);
			$location	=	htmlspecialchars($_POST['location']);
			$start_date	=	htmlspecialchars($_POST['start_date']);
			$status		=	htmlspecialchars($_POST['status']);
			$addCar 	=	addCar($model, $plate, $start_date, $location, $status);
			$carAdded 	=	true;
			include 'view/cars.php';
		}
		else{
			include 'view/cars.php';
		}
	break;

	case 'edit_car':
		if(isset($_GET['id'])){
			$id 			=	intval($_GET['id']);
			$getCarInfo		=	getCarInfo($id);
			if(mysqli_num_rows($getCarInfo) == 0){
				header('Location:cars.php');
			}
			else{
				$get_car		=	mysqli_fetch_array($getCarInfo);
				//Editing the car
				if(isset($_POST['edit_car'])){
					$model 		=	htmlspecialchars($_POST['model']);
					$plate		=	htmlspecialchars($_POST['plate']);
					$location	=	htmlspecialchars($_POST['location']);
					$start_date	=	htmlspecialchars($_POST['start_date']);
					$status		=	htmlspecialchars($_POST['status']);
					$editCar 	=	editCar($model, $plate, $start_date, $location, $status, $id);
					header('Location:cars.php');
				}
				else{
					include 'view/cars.php';
				}
			}
		}
	break;

	case 'delete_car':
		if(isset($_GET['id']))
			deleteCar($_GET['id']);
		header('Location:cars.php');
	break;

	default:
		//Get all cars
		$allCars		=	allCars();
		if(mysqli_num_rows($allCars) == 0)
			$no_car	=	true;
		else
			$no_car 	=	false;
		include 'view/cars.php';
	break;
}
include 'model/closeConnection.php';
?>