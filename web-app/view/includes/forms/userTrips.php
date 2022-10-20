<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>
                List of <span style="text-transform: capitalize;"><?php echo getUserNames($user_id); ?>'s</span> trips
            </div>
            <div class="panel-body">
                <table class="table"> 
					<thead> 
						<tr> 
							<th>#</th> 
							<th>Driver</th> 
                            <th>From</th> 
                            <th>Destination</th> 
                            <th>Charged fee</th>
                            <th>Trip status</th>
                            <th>Trip Review</th>
                            <th>Trip date</th>  
						</tr> 
					</thead> 
					<tbody>
                        <?php
                        if(isset($no_trip) AND $no_trip == true){
                            ?>
                            <tr>
                                <td colspan="8" align="center">No trip found.</td>
                            </tr>
                            <?php
                        }
                        else{
                            $i  =   0;
                            while($trip    =   mysqli_fetch_assoc($trips)){
                                ?>
        						<tr> 
        							<th scope="row"><?php echo ++$i;?></th> 
        							<td><?php echo $trip['standing_location']; ?></td> 
        							<td><?php echo $trip['destination']; ?></td> 
                                    <td>
                                        <?php echo $trip['charged_fee']; ?> 
                                        ( <?php 
                                            if(isset($trip['payment_status']) == 1){
                                                echo '<span class="alert alert-success">Paid</span>';
                                            } 
                                            else{
                                                echo '<span class="alert alert-danger">Unpaid</span>';
                                            } 
                                            ?>
                                        )
                                    </td> 
                                    <td><?php echo $trip['status']; ?></td> 
                                    <td><?php echo nl2br($trip['review']); ?></td> 
                                    <td><?php echo date("D, d - F - Y, h:i", $trip['created_at']); ?></td> 
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