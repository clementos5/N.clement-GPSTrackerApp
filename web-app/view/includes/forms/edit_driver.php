<div class="row">
    <div class="col-lg-8  col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit driver 
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">          
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>First name</label>
                                <input class="form-control" type="text" name="first_name" value="<?php echo $get_driver['firstname'];?>" />
                            </div>
                            <div class="form-group">
                                <label>Last name</label>
                                <input class="form-control" type="text" name="last_name" value="<?php echo $get_driver['lastname'];?>" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" value="<?php echo $get_driver['email'];?>" />
                            </div>
                            <div class="form-group">
                                <label>Phone number</label>
                                <input class="form-control" type="text" name="phone" value="<?php echo $get_driver['phone_number'];?>"  />
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <input class="form-control" type="text" name="location" value="<?php echo $get_driver['location'];?>" />
                            </div>
                            <div class="form-group">
                                <label>License</label>
                                <input class="form-control" type="text" name="license" value="<?php echo $get_driver['license'];?>" />
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="Male" <?php if($get_driver['gender'] == "Male") echo 'selected';?>>Male</option>
                                    <option value="Female" <?php if($get_driver['gender'] == "Female") echo 'selected';?>>Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="Working" <?php if($get_driver['status'] == "Working") echo 'selected';?>>Working</option>
                                    <option value="Not working" <?php if($get_driver['status'] == "Not working") echo 'selected';?>>Not working</option>
                                </select>
                            </div>
                            <button type="submit" name="edit_driver" class="btn btn-success">Save changes</button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    