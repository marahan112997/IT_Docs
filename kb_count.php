			<?php 
				if($_SESSION['privilege']=='Super Admin'){
				
			?>

<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-check"></i>
              KB approved per employee </div>
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
									$queryr= mysqli_query ($conn,"Select * FROM tbl_kb WHERE kb_status='Approved'");
												
												$data = array();
											$data = array();
											while ($row = mysqli_fetch_array($queryr, MYSQLI_ASSOC)) {
													$data[$row['kb_id']] = $row['kb_author'];
					
													
													
											}
											
											$data=array_unique($data);
											$comma_separated = implode(",", $data);
											$comma_separated = explode(",", $comma_separated);
											$count_data=count($comma_separated);
											$result=$comma_separated;
											
											
											if($count_data>1){
												$first=$result[0];
											}
											print_r($first);
											
								?>
                     
						</tbody>
					</table>
              </div>
            </div>
            
          </div>
         
            
		  <?php
		  
				}
			?>