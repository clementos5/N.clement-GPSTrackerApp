<?php
include 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cars</h1>
        </div>
    </div>
	<?php
	switch($action){
		case 'add_car':
			include 'includes/forms/add_car.php';
		break;

		case 'edit_car':
			include 'includes/forms/edit_car.php';
		break;

		default:
			if(isset($no_car) AND $no_car == true){
				echo '<center>No car available.</center>';
			}
			else{
				include 'includes/forms/allCars.php';
			}
		break;
	}
echo '</div>';
include 'includes/footer.php';
?>