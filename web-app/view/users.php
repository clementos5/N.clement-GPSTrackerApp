<?php
include 'includes/header.php';
?>
<div id="page-wrapper">	
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
    </div>
	<?php
	switch($action){
		case 'add_user':
			include 'includes/forms/add_user.php';
		break;

		case 'edit_user':
			include 'includes/forms/edit_user.php';
		break;

		case 'requests':
			include 'includes/forms/userRequests.php';
		break;

		case 'trips':
			include 'includes/forms/userTrips.php';
		break;

		default:
			if(isset($no_user) AND $no_user == true){
				echo 'No user.';
			}
			else{
				include 'includes/forms/allUsers.php';
			}
		break;
	}
	?>
</div>
<?php
include 'includes/footer.php';
?>