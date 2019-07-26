 <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-fw fa-folder"></i>
              IT Policies & Procedures
		
			</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th>Policy Number</th>
						<th>Title</th>
						<th>Author</th>
						<th>Effectivity Date</th>
						<th>Action</th>
                   
                    </tr>
						</thead>
							<tbody>
								<?php
									include'../dbcon.php';
									$queryr= mysqli_query ($conn,"Select * FROM tbl_policy WHERE version='New' AND file_type='Policy'");
												$ctr=1;
										while($row= mysqli_fetch_assoc($queryr)){
											
											echo"<tr>";
											echo '<td>'.$row['policy_number'].'</td>';
											echo '<td>'.$row['title'].'</td>';
											echo '<td>'.$row['author'].'</td>';
											echo '<td>'.$row['effectivity_date'].'</td>';
											$ctr++;
											echo "<td>";
											?>
											<a href = "view_pdf.php?id=<?php echo $row['temp_title']?>" class="btn btn-primary"target="_blank" onclick="return confirm('Are you sure you want to view this Procedure ?')">VIEW</a>
											<?php			
											
											echo"</td>";
											echo"</tr>";
										}
						
								?>
                     
						</tbody>
					</table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
         
            
    