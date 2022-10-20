<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> List of Commnents
            </div>
            <div class="panel-body">
                <table class="table"> 
					<thead> 
						<tr> 
							<th>#</th> 
							<th>Full name</th> 
                            <th>Email</th> 
                            <th>Phone Number</th>
                            <th>Message</th> 
							<th colspan="2">Actions</th>  
						</tr> 
					</thead> 
					<tbody>
                        <?php
                        $i  =   0;
                        while($comment    =   mysqli_fetch_assoc($allComments)){
                            ?>
    						<tr> 
    							<th scope="row"><?php echo ++$i;?></th> 
    							<td><?php echo $comment['names']; ?></td> 
    							<td><?php echo $comment['email']; ?></td> 
                                <td><?php echo $comment['phone']; ?></td> 
                                <td><?php echo $comment['comment']; ?></td> 
                                <td align="center"><a href="#">ANSWER</a></td> 
    							<td align="center">
                                    <a href="#" onclick="return confirm('Are you sure you want to delete this car?');">Mark as Seen</a>
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