<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Change your password
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php 
                    if(isset($password_changed) AND $password_changed == true)
                        echo '<div class="col-lg-12 temporary"><i class="fa fa-check color-success"> Your password was changed</i></div>';
					if(isset($passwords_do_not_match) AND $passwords_do_not_match == true)
                        echo '<div class="col-lg-12 temporary"><i class="fa fa-times color-failure"> Passwords do not match</i></div>';
					if(isset($wrong_old_password) AND $wrong_old_password == true)
                        echo '<div class="col-lg-12 temporary"><i class="fa fa-times color-failure"> Wrong current password</i></div>';
					
                    ?>
                    <div class="col-lg-6">          
                        <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>Current password</label>
                                <input class="form-control" type="password" name="old_password" required />
                            </div>
							<div class="form-group">
                                <label>New password</label>
                                <input class="form-control" type="password" name="new_password" required />
                            </div>
							<div class="form-group">
                                <label>Confirm new password</label>
                                <input class="form-control" type="password" name="re_password" required />
                            </div>
                            <button type="submit" name="change_password" class="btn btn-success">Change password</button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    