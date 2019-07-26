<?php
session_start();
include'dbcon.php';
if (isset($_SESSION['username']))
{
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="logo.png">

    <?php
    include 'sample100.php';
    ?>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

		<?php
		include 'nav.php';
		
		?>
    

    <div id="wrapper">

      <!-- Sidebar -->
      <?php
		include 'sidebar.php';
		
		?>

      <div id="content-wrapper">
		
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="ser_view.php">Updated Version</a>
            </li>
            <li class="breadcrumb-item active">
              <a href="revised_ser.php">Previous Version</a>
            </li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-lock"></i>
              Previous Security Exception Request
				
			</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th>SER Number</th>
						<th>Title</th>
						<th>Approved Date</th>
            <th>Expiration Date</th>
            <th>Days Remaining</th>
						<th>Actions</th>
                   
                    </tr>
						</thead>
							<tbody>
								<?php
									include'dbcon.php';
									
									$queryr= mysqli_query ($conn,"Select * FROM tbl_ser WHERE updated_file!=''");
												$ctr=1;
										while($row= mysqli_fetch_assoc($queryr)){
											
					                    $approved_date=$row['approved_date'];
					                    $expiration_date=$row['expiration_date'];
					                    $approved_date=date_create(date("Y-m-d"));
					                    $expiration_date=date_create($expiration_date);
					                    $diff=date_diff($approved_date,$expiration_date);
					                    $days=$diff->format("%R%a days");
					                    $days=str_replace("+", "", $days);
					                    // $days=str_replace("-", "Overdue", $days);
					                    // $days=str_replace("-", "Overdue", $days);
					                    	if (strpos($days, '-') !== false) {
											    $days='Overdue';
											}
											if (strpos($days, '0') !== false) {
											    $days='Overdue';
											}
											echo"<tr>";
											echo '<td>'.$row['ser_number'].'</td>';
											echo '<td>'.$row['ser_title'].'</td>';
											echo '<td>'.$row['approved_date'].'</td>';
                    	echo '<td>'.$row['expiration_date'].'</td>';
                    	echo '<td>'.$days.'</td>';
											$ctr++;
											echo "<td>";
											?>
											<a href = "ser_result.php?id=<?php echo $row['temp_title']?>" class="btn btn-primary"target="_blank" onclick="return confirm('Are you sure you want to view this SER ?')">VIEW</a>
											<?php
											if($_SESSION['privilege']=='Super Admin'){
											?>
											<a href = "delete_ser.php?id=<?php echo $row['ser_id']?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete this SER ?')">Delete</a>
											
											
											<?php
											}
											
													
											
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
         
            
          </div>
			 
        </div>
        <!-- /.container-fluid -->
		
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
<?php
}
else
{
	header("location:error.php");
}
?>