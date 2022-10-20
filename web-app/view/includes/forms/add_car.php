<div class="row">
    <div class="col-lg-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Add car 
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php 
                    if(isset($carAdded))
                        echo '<div class="col-lg-12 temporary"><i class="fa fa-check color-success"> car added</i></div>';
                    ?>
                    <div class="col-lg-12">          
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Model</label>
                                <input class="form-control" type="text" name="model" />
                            </div>
                            <div class="form-group">
                                <label>Plate number</label>
                                <input class="form-control" type="text" name="plate" />
                            </div>
                            <div class="form-group">
                                <label>Work location</label>
                                <input class="form-control" type="text" name="location" />
                            </div>
                            <div class="form-group">
                                <label>Service start date</label>
                                <input class="form-control" type="date" name="start_date" />
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="Working">Working</option>
                                    <option value="Not working">Not working</option>
                                </select>
                            </div>
                            <button type="submit" name="add_car" class="btn btn-success">Add car</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
