<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit user 
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>First name</label>
                                <input class="form-control" value="<?php echo $user['first_name'];?>" name="first_name"  />
                            </div>
                            <div class="form-group">
                                <label>Last name</label>
                                <input class="form-control" value="<?php echo $user['last_name'];?>" name="last_name"  />
                            </div>
                            <div class="form-group">
                                <label>Phone number</label>
                                <input class="form-control" value="<?php echo $user['phone_number'];?>" name="phone_number"  />
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" value="<?php echo $user['email'];?>" name="email"  />
                            </div>
                            <button type="submit" name="edit_user" class="btn btn-success">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    