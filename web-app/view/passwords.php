<?php
include 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Change password</h1>
        </div>
    </div>
	<?php
	switch($action){
		case '':
		break;

		default:
			include 'includes/forms/change_password.php';
		break;
	}
	?>
</div>
<?php
include 'includes/footer.php';
?>