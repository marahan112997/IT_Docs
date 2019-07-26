			<?php 
				if($_SESSION['privilege']=='Super Admin'){
				
			?>

<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-check"></i>
              5 Latest Approved </div>
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
						
                   
                    </tr>
						</thead>
							<tbody>
							
								<?php
									include'dbcon.php';
									$type='Network';
									$queryr= mysqli_query ($conn,"Select * FROM tbl_kb WHERE kb_status='Approved' AND update_file !='True' ORDER BY kb_date DESC LIMIT 5");
												$ctr=1;
										while($row= mysqli_fetch_assoc($queryr)){
											echo"<tr>";
											echo '<td>'.$ctr.'</td>';
											echo '<td>'.$row['title_kb'].'</td>';
											echo '<td>'.$row['kb_author'].'</td>';
											echo '<td>'.$row['kb_number'].'</td>';
											echo '<td>'.$row['kb_date'].'</td>';
											$ctr++;
											
											?>
											
											
											<?php
											echo"</tr>";
										}
									
						
								?>
                     
						</tbody>
					</table>
              </div>
            </div>
            
          </div>
         
            
		  <?php
		  
				}
			?>