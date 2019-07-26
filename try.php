			<?php 
				if($_SESSION['privilege']=='Super Admin'){
				$date_time = date("Y-m-d");
				$date_parse= explode('-', $date_time);
				$minus=$date_parse[1]-1;
				$date_combine=$date_parse[0].'-0'.$minus;
				$monthName = date("F", mktime(0, 0, 0, $minus, 10));
			?>

<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-check"></i>
              Number of KB Approved in the month of <b> <?php echo $monthName; ?></b> </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						
						<th>Author</th>
						<th>Number of KB Approved</th>
						
						
                   
                    </tr>
						</thead>
							<tbody>
							
								<?php
									include'dbcon.php';
									$date_time = date("Y-m-d");
									$date_parse= explode('-', $date_time);
									$minus=$date_parse[1]-1;
									$date_combine=$date_parse[0].'-0'.$minus;
									$sqltran = mysqli_query($conn, "SELECT DISTINCT tblaccounts.fullname FROM tbl_kb INNER JOIN tblaccounts ON tbl_kb.kb_author = tblaccounts.fullname WHERE tblaccounts.fullname = tbl_kb.kb_author")or die(mysqli_error($conn));
											$arrVal = array();
											while ($row = mysqli_fetch_array($sqltran)) {
											$fullname= $row['fullname'];
											$sql="SELECT count(kb_author) as total FROM tbl_kb WHERE kb_author = '$fullname' AND update_file !='True' AND kb_status='Approved' AND date_approve LIKE '%$date_combine%'";
											$result=mysqli_query($conn,$sql);
											$values=mysqli_fetch_assoc($result);
											$num_rows=$values['total'];
											
											echo '<tr>';
											echo '<td>'. $fullname . '</td>';
											echo '<td>'. $num_rows . '</td>';
											echo '</tr>';
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