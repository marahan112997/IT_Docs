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
          <!-- <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol> -->

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-briefcase"></i>
              For Approval Change Documents</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th>#</th>
						<th>Title</th>
						<th>Author</th>
						<th>Ticket Number</th>
						<th>Actions</th>
                   
                    </tr>
						</thead>
							<tbody>
								<?php
									include'dbcon.php';
									$fullname=$_SESSION['firstname'].' '.$_SESSION['lastname'];
									$queryr= mysqli_query ($conn,"Select * FROM tbl_changedocs WHERE status='Pending'");
												$ctr=1;
										while($row= mysqli_fetch_assoc($queryr)){

											$id=$row['changedocs_id'];
											$temp_title=$row['temp_title'];
											echo"<tr>";
											echo '<td>'.$ctr.'</td>';
											echo '<td>'.$row['title'].'</td>';
											echo '<td>'.$row['author'].'</td>';
											echo '<td>'.$row['ticket_number'].'</td>';
											$ctr++;
											echo "<td>";


										
											echo '<button data-toggle="modal" data-target="#exampleModalview'.$row['changedocs_id'].'" class="btn btn-success btn-square" data-toggle="tooltip" data-placement="top" title="Approve"><i class="fa fa-thumbs-up"></i></button>';
											echo '&nbsp;';
											
											echo '<button type="button"  data-toggle="modal" data-target="#exampleModaldelete'.$row['changedocs_id'].'" class="btn btn-danger btn-square" data-toggle="tooltip" data-placement="top" title="Reject"><i class="fa fa-thumbs-down"></i></button>';
											

											echo '&nbsp;';
											
											
											
											echo "<a href='result3.php?id=$temp_title'  target='_blank' class='btn btn-primary btn-square' title='View Changedocs'><i class='fa fa-eye'></i></button></a>";
											echo "</td>";
											
													
											
											echo"</tr>";

											?>



											<!-- Approve Modal -->
											<div class="modal fade" id="exampleModalview<?php echo $row['changedocs_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h4 class="modal-title" id="exampleModalLabel">Approve Change Document</h4>
													
												  </div>
													<div class="modal-body">
																	Are you sure you want to Approve this Change Document? 
													</div>
													<div class="modal-footer">

														<form action="approve_changedocs.php" method="POST" enctype="multipart/form-data">
															<input type="text" name="changedocs_id" value="<?php echo $row['changedocs_id']; ?>" hidden>
															<div class="form-group">
															<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
															<button type="submit" name="deleteSlideShow" class="btn btn-success">Approve</button>
															</div>
														</form>
												  </div>
												</div>
											  </div>
											</div>
									<!-- end Approve Modal -->
									
									<!-- Reject Modal -->
											<div class="modal fade" id="exampleModaldelete<?php echo $row['changedocs_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h4 class="modal-title" id="exampleModalLabel">Reject Change Document</h4>
													
												  </div>
												  <form action="reject_docs.php" method="POST" enctype="multipart/form-data">
													<div class="modal-body">
																	Are you sure you want to Reject this Change Document? 
													</div>
													<div class="col-md-12">
														Message:
											                  <div class="form-label-group">
											                    <!-- <input  class="form-control"  type="text" name="message" required="required" autocomplete="off"> -->

											                    <textarea class="form-control" name="message"></textarea>
																
											                  </div>
											                </div>
														<div class="modal-footer">

														
															<input type="text" name="changedocs_id" value="<?php echo $row['changedocs_id']; ?>" hidden>
															<div class="form-group">
															
															<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
															<button type="submit" name="deleteSlideShow" class="btn btn-danger">Reject</button>
															</div>
														</form>
												  </div>
												</div>
											  </div>
											</div>
									<!-- end Reject Modal -->
									
									
									
									
										<?php
										}
						
										?>
                     
						</tbody>
					</table>
              </div>
            </div>
            <div class="card-footer small text-muted"></div>
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