<?php
function addCar($model, $plate, $start_date, $location, $status){
	global $link;
	$addCar 	=	mysqli_query($link, 'INSERT INTO cars SET model = "'.$model.'", plate_number = "'.$plate.'", work_location = "'.$location.'", service_start_date = "'.$start_date.'", status = "'.$status.'", created_at = '.time());
	if(mysqli_affected_rows($link) == 0)
		return true;
	else
		return false;
}

function editCar($model, $plate, $start_date, $location, $status, $id){
	global $link;
	$editCar 	=	mysqli_query($link, 'UPDATE cars SET model = "'.$model.'", plate_number = "'.$plate.'", work_location = "'.$location.'", service_start_date = "'.$start_date.'", status = "'.$status.'" WHERE id = '.$id);
	if(mysqli_affected_rows($link) == 0)
		return true;
	else
		return false;
}

function allCars(){
	global $link;
	$allCars 	=	mysqli_query($link, 'SELECT * FROM cars WHERE 1 ORDER BY id DESC');
	return $allCars;
}

function getCarInfo($id){
	global $link;
	$carInfo 	=	mysqli_query($link, 'SELECT * FROM cars WHERE id = '.$id);
	return $carInfo;
}

function deleteCar($id){
	global $link;
	mysqli_query($link, 'DELETE FROM cars WHERE id = '.$id);
	return true;
}
?>