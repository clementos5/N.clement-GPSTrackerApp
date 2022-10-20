<?php
session_start();
if(!isset($_SESSION['user_id']))
	header('Location:index.php');
include 'model/openConnection.php';
include 'model/contact.php';
if(isset($_GET['do']))
	$action = htmlspecialchars($_GET['do']);
else
	$action = "default";

//get all comments from  contact form
		$allComments		=	ViewSiteComment();
		if(mysqli_num_rows($allComments) == 0)
			$no_comment	=	true;
		else
			$no_comment 	=	false;
		include 'view/contact.php';


include 'model/closeConnection.php';

?>