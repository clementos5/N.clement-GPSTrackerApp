<?php
include 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Drivers</h1>
        </div>
    </div>
	<?php
	switch($action){
		case 'add_driver':
			include 'includes/forms/add_driver.php';
		break;

		case 'edit_driver':
			include 'includes/forms/edit_driver.php';
		break;

		default:
			if(isset($no_driver) AND $no_driver == true){
				echo '<center>No driver available.</center>';
			}
			else{
				include 'includes/forms/allDrivers.php';
			}
		break;
	}
echo '</div>';
include 'includes/footer.php';
?>