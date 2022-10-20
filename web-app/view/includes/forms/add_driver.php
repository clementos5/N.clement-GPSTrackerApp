<div class="row">
    <div class="col-lg-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Add driver 
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php 
                    if(isset($driverAdded))
                        echo '<div class="col-lg-12 temporary"><i class="fa fa-check color-success"> driver added</i></div>';
                    ?>
                    <div class="col-lg-12">          
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>First name</label>
                                <input class="form-control" type="text" name="first_name" />
                            </div>
                            <div class="form-group">
                                <label>Last name</label>
                                <input class="form-control" type="text" name="last_name" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="Password" name="password" />
                            </div>
                            <div class="form-group">
                                <label>Phone number</label>
                                <input class="form-control" type="phone" name="phone" />
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <input class="form-control" type="text" name="location" />
                            </div>
                            <div class="form-group">
                                <label>License</label>
                                <input class="form-control" type="text" name="license" />
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="Working">Working</option>
                                    <option value="Not working">Not working</option>
                                </select>
                            </div>
                            <button type="submit" name="add_driver" class="btn btn-success">Add driver</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
