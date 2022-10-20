<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>
                List of <span style="text-transform: capitalize;"><?php echo getUserNames($user_id); ?>'s</span> requests
            </div>
            <div class="panel-body">
                <table class="table"> 
					<thead> 
						<tr> 
							<th>#</th> 
							<th>Pickup location</th> 
                            <th>Destination</th> 
                            <th>Pickup time</th>
                            <th>Request date</th>  
						</tr> 
					</thead> 
					<tbody>
                        <?php
                        if(isset($no_request) AND $no_request == true){
                            ?>
                            <tr>
                                <td colspan="5" align="center">No request found.</td>
                            </tr>
                            <?php
                        }
                        else{
                            $i  =   0;
                            while($request    =   mysqli_fetch_assoc($requests)){
                                ?>
        						<tr> 
        							<th scope="row"><?php echo ++$i;?></th> 
        							<td><?php echo $request['standing_location']; ?></td> 
        							<td><?php echo $request['destination']; ?></td> 
                                    <td><?php echo $request['pickup_time']; ?></td> 
                                    <td><?php echo date("D, d - F - Y, h:i", $request['created_at']); ?></td> 
        						</tr> 
                                <?php
                            }
                        }
                        ?>
					</tbody> 
				</table>
            </div>
        </div>
    </div>
</div>