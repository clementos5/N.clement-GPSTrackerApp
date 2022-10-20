<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List of users
            </div>
            <div class="panel-body">
                <table class="table"> 
					<thead> 
						<tr> 
							<th>#</th> 
							<th>First name</th> 
							<th>Last name</th> 
							<th>Phone number</th> 
							<th>Email</th> 
							<th>Balance</th> 
							<th>Registration date</th> 
							<th colspan="5" style="text-align: center;">Actions</th> 
						</tr> 
					</thead> 
					<tbody>
						<?php
						$i=0;
						while($user = mysqli_fetch_assoc($getAllUsers)){
							?>
							<tr> 
								<th scope="row"><?php echo ++$i;?></th> 
								<td><?php echo $user['first_name'];?></td> 
								<td><?php echo $user['last_name'];?></td> 
								<td><?php echo $user['phone_number'];?></td> 
								<td><?php echo $user['email'];?></td> 
								<td><?php echo getUserBalance($user['id']);?></td> 
								<td><?php echo date("D, d-F-Y", $user['created_at']); ?></td>
								<td>
									<a href="#" data-toggle="modal" data-target="#recharge_<?php echo $user['id'];?>">Recharge</a>
									<div class="modal fade" id="recharge_<?php echo $user['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header btn-primary">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title" id="simpleModalLabel">Recharge <?php echo $user['last_name'];?>'s account</h4>
												</div>
												<div class="modal-body" style="padding-top:0;">
													<form class="" action="users.php?do=recharge" method="post">
														<input type="hidden" name="_user" value="<?php echo $user['id'];?>" />
														<div class="form-group">
															<label>Current balance</label>
															<input type="text" name="current_balance" class="form-control" disabled value="<?php echo getUserBalance($user['id']); ?>" />
														</div>
														<div class="form-group">
															<label>Amount to recharge</label>
															<input type="number" name="amount" class="form-control" />
														</div>
														<div class="form-group">
															<button type="submit" name="recharge" class="btn btn-success">Recharge account</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</td> 
								<td align="center"><a href="users.php?do=requests&amp;user=<?php echo $user['id'];?>">Requests</a></td> 
								<td align="center"><a href="users.php?do=trips&amp;user=<?php echo $user['id'];?>">Trips</a></td> 
								<td align="center"><a href="users.php?do=edit_user&amp;user=<?php echo $user['id'];?>">Edit</a></td> 
								<td align="center"><a href="users.php?do=delete_user&amp;user=<?php echo $user['id'];?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a></td> 
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