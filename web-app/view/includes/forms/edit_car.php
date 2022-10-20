<div class="row">
    <div class="col-lg-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit car 
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">          
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Model</label>
                                <input class="form-control" type="text" name="model" value="<?php echo $get_car['model'];?>" />
                            </div>
                            <div class="form-group">
                                <label>Plate number</label>
                                <input class="form-control" type="text" name="plate" value="<?php echo $get_car['plate_number'];?>" />
                            </div>
                            <div class="form-group">
                                <label>Work location</label>
                                <input class="form-control" type="text" name="location" value="<?php echo $get_car['work_location'];?>" />
                            </div>
                            <div class="form-group">
                                <label>Service start date</label>
                                <input class="form-control" type="date" name="start_date" value="<?php echo $get_car['service_start_date'];?>" />
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="Working" <?php if($get_car['status'] == 'Working'){echo 'selected';} ?>>Working</option>
                                    <option value="Not working" <?php if($get_car['status'] == 'Not working'){echo 'selected';} ?>>Not working</option>
                                </select>
                            </div>
                            <button type="submit" name="edit_car" class="btn btn-success">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
