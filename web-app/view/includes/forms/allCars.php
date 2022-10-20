<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> List of cars
            </div>
            <div class="panel-body">
                <table class="table"> 
					<thead> 
						<tr> 
							<th>#</th> 
							<th>Model</th> 
                            <th>Plate number</th> 
                            <th>Service start date</th>
                            <th>Location</th>
							<th>Status</th> 
							<th colspan="2">Actions</th>  
						</tr> 
					</thead> 
					<tbody>
                        <?php
                        $i  =   0;
                        while($car    =   mysqli_fetch_assoc($allCars)){
                            ?>
    						<tr> 
    							<th scope="row"><?php echo ++$i;?></th> 
    							<td><?php echo $car['model']; ?></td> 
    							<td><?php echo $car['plate_number']; ?></td> 
                                <td><?php echo $car['service_start_date']; ?></td> 
                                <td><?php echo $car['work_location']; ?></td> 
    							<td><?php echo $car['status']; ?></td> 
                                <td align="center"><a href="cars.php?do=edit_car&amp;id=<?php echo $car['id']; ?>">Edit</a></td> 
    							<td align="center">
                                    <a href="cars.php?do=delete_car&amp;id=<?php echo $car['id']; ?>" onclick="return confirm('Are you sure you want to delete this car?');">Delete</a>
                                </td> 
    						</tr> 
                            <?php
                        }
                        ?>
					</tbody> 
				</table>
            </div>
        </div>
    </div>
</div>