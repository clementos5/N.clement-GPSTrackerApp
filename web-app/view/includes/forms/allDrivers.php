<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> List of drivers
            </div>
            <div class="panel-body">
                <table class="table"> 
					<thead> 
						<tr> 
							<th>#</th> 
							<th>Names</th> 
                            <th>Phone</th> 
                            <th>Email</th> 
							<th>Gender</th> 
                            <th>License</th> 
							<th>Status</th> 
							<th colspan="2">Actions</th>  
						</tr> 
					</thead> 
					<tbody>
                        <?php
                        $i  =   0;
                        while($driver    =   mysqli_fetch_assoc($allDrivers)){
                            ?>
    						<tr> 
    							<th scope="row"><?php echo ++$i;?></th> 
    							<td><?php echo $driver['firstname'].' '.$driver['lastname']; ?></td> 
    							<td><?php echo $driver['phone_number']; ?></td> 
                                <td><?php echo $driver['email']; ?></td>
                                <td><?php echo $driver['gender']; ?></td> 
                                <td><?php echo $driver['license']; ?></td> 
    							<td><?php echo $driver['status']; ?></td> 
                                <td align="center"><a href="drivers.php?do=edit_driver&amp;id=<?php echo $driver['id']; ?>">Edit</a></td> 
    							<td align="center"><a href="drivers.php?do=delete_driver&amp;id=<?php echo $driver['id']; ?>" onclick="return confirm('Are you sure you want to delete this driver?');">Delete</a></td> 
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