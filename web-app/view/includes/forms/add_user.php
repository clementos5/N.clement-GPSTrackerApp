<div class="row">
    <div class="col-lg-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Add user 
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php 
                    if(isset($user_added))
                        echo '<div class="col-lg-12 temporary"><i class="fa fa-check color-success"> user added</i></div>';
                    ?>
                    <div class="col-lg-12">          
                        <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>First name</label>
                                <input class="form-control" name="first_name"  />
                            </div>
                            <div class="form-group">
                                <label>Last name</label>
                                <input class="form-control" name="last_name"  />
                            </div>
                            <div class="form-group">
                                <label>Phone number</label>
                                <input class="form-control" name="phone_number"  />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email"  />
                            </div>
                            <button type="submit" name="add_user" class="btn btn-success">Add user</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    