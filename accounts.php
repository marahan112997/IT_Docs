<?php
session_start();
include'dbcon.php';
if (isset($_SESSION['username']))
{
// if($_SESSION['privilege']=='Super Admin'){
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
	              <a href="#">Dashboard</a>
	            </li>
	            <li class="breadcrumb-item active">Overview</li>
          	</ol>
          <!-- Icon Cards-->
	      	<div class="card mb-3">
	            <div class="card-header">
	              <i class="fas fa-users"></i>
	              Users List  <a href="addaccount.php" style="float:right" class="btn btn-success" title='Add Account' role="button"onclick="return confirm('Are you sure you want to add a account ?')"><i class="fa fa-plus"></i></a>
	          	</div>
	            <div class="card-body">
	              	<div class="table-responsive">
		                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		                  	<thead>
		                    	<tr>
									<th>#</th>
									<th>Name</th>
									<th>Username</th>
									<th>Team</th>
									<th>Privilege</th>
									<th>Action</th>
		                    	</tr>
							</thead>
								<tbody>
									<?php
										include'dbcon.php';
										$queryr= mysqli_query ($conn,"Select * FROM tblaccounts ORDER BY firstname ASC");
										$ctr=1;
										while($row= mysqli_fetch_assoc($queryr)){
											echo"<tr>";
												echo '<td>'.$ctr.'</td>';
												echo '<td>'.$row['firstname'].'&nbsp;'.$row['lastname'].'</td>';
												echo '<td>'.$row['username'].'</td>';
												echo '<td>'.$row['team'].'</td>';
												echo '<td>'.$row['privilege'].'</td>';
												if($_SESSION['privilege']=='Super Admin'){
												?>
													<td>
														<a href = "editaccount.php?id=<?php echo $row['user_ID']?>" title='Edit Account' class="btn btn-warning"onclick="return confirm('Are you sure you want to edit this account ?')"><i class="fa fa-edit"></i></a>
														<a href = "deleteaccount.php?id=<?php echo $row['user_ID']?>" style="float:center" class="btn btn-danger" role="button" title='Delete Account' onclick="return confirm('Are you sure you want to delete this account ?')"><i class="fa fa-trash"></i></a>
													</td>
												<?php
												}else{
													?>
													<td>
														<a href = "editaccount.php?id=<?php echo $row['user_ID']?>" title='Edit Account' class="btn btn-warning disabled"onclick="return confirm('Are you sure you want to edit this account ?')" disabled>Edit</a>
														<a href = "deleteaccount.php?id=<?php echo $row['user_ID']?>" style="float:center" title='Delete Account' class="btn btn-danger disabled" role="button" disabled onclick="return confirm('Are you sure you want to delete this account ?')">Delete</a>
													</td>
												<?php
												}	
											echo"</tr>";
                    						$ctr++;
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
	    <div class="copyright text-center my-auto"></div>
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
// }
// header("location:index.php");
}
else
{
header("location:error.php");
}
?>
