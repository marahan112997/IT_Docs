<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example <a href="addkb.php" style="float:right" class="btn btn-success" role="button" onclick="return confirm('Are you sure you want to add a KB Article ?')">Upload KB</a> </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th>#</th>
						<th>Title</th>
						<th>Author</th>
						<th>KB Number</th>
						<th>Date upload</th>
						<th>Actions</th>
                   
                    </tr>
						</thead>
							<tbody>
								<?php
									include'dbcon.php';
									$type='Network';
									$queryr= mysqli_query ($conn,"Select * FROM tbl_kb WHERE kb_status='Approved'");
												$ctr=1;
										while($row= mysqli_fetch_assoc($queryr)){
											echo"<tr>";
											echo '<td>'.$ctr.'</td>';
											echo '<td>'.$row['kb_title'].'</td>';
											echo '<td>'.$row['kb_author'].'</td>';
											echo '<td>'.$row['kb_number'].'</td>';
											echo '<td>'.$row['kb_date'].'</td>';
											$ctr++;
											echo "<td>";
											?>
											<a href = "result.php?id=<?php echo $row['kb_title']?>" class="btn btn-warning"target="_blank" onclick="return confirm('Are you sure you want to vie this KB Article ?')">VIEW</a>
											<a href = "deletekb.php?id=<?php echo $row['kb_title']?>" style="float:center" class="btn btn-danger" role="button" onclick="return confirm('Are you sure you want to delete this KB Article ?')">Delete</a></td>
											
											
											<?php
											echo"</tr>";
										}
						
								?>
                     
						</tbody>
					</table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
         
            
          </div>