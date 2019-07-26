<?php
session_start();
if (isset($_SESSION['username']))
	
{
	// if($_SESSION['team']=='Server' OR $_SESSION['privilege']=='Super Admin'){
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
              <i class="fas fa-table"></i>
              KB Articles Server Team<a href="addkb.php" style="float:right" class="btn btn-success" role="button">Upload KB</a> </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th>#</th>
						<th>Title</th>
						<th>Author</th>
						<th>KB Number</th>
            <th>Version</th>
						<th>Date upload</th>
						<th>Actions</th>
                   
                    </tr>
						</thead>
							<tbody>
								<?php
									include'dbcon.php';
									$fullname=$_SESSION['firstname'].' '.$_SESSION['lastname'];
									$queryr= mysqli_query ($conn,"Select * FROM tbl_kb WHERE kb_type='Server' AND kb_status='Approved' AND update_file !='True'");
												$ctr=1;
										while($row= mysqli_fetch_assoc($queryr)){
                      $parser=explode('_',$row['kb_number']);
                      $parser_count=count($parser);
                      $parser_count;
                      
                      if($parser_count==1){
                        $version='None';
                        $kb_number=$parser[0];
                        $kb_number=explode("-",$kb_number);
                        $kb_number=$kb_number[0].'-'.$kb_number[1].'-'.$kb_number[2].'-'.$kb_number[3].'-'.$kb_number[5];
                      }else{
                        $version=$parser[1]+1;
                        $version='Version '.$version;
                        $kb_number=$parser[0];
                        $kb_number=explode("-",$kb_number);
                        $kb_number=$kb_number[0].'-'.$kb_number[1].'-'.$kb_number[2].'-'.$kb_number[3].'-'.$kb_number[5];
                      }
											echo"<tr>";
											echo '<td>'.$ctr.'</td>';
											echo '<td>'.$row['title_kb'].'</td>';
											echo '<td>'.$row['kb_author'].'</td>';
											echo '<td>'.$kb_number.'</td>';
                      echo '<td>'.$version.'</td>';
											echo '<td>'.$row['kb_date'].'</td>';
											$ctr++;
											echo "<td>";
											
											
												?>
													<a href = "result.php?id=<?php echo $row['kb_title']?>" class="btn btn-primary"target="_blank" title="View" onclick="return confirm('Are you sure you want to view this KB Article ?')"><i class="fa fa-eye"></i></a>
													<?php
											if($_SESSION['team']==$row['team']){
											?>
											<a href = "sample1.php?id=<?php echo $row['kb_id']?>&kb_title=<?php echo $row['kb_title']?>&kb_number=<?php echo $row['kb_number']?>&kb_type=<?php echo $row['kb_type']?>&title_kb=<?php echo $row['title_kb']?>" class="btn btn-warning" title="Update" onclick="return confirm('Are you sure you want to update this KB Article ?')"><i class="fa fa-edit"></i></a>
											
											
											<?php
											}
											?>
											<a href = "edited_kb.php?id=<?php echo $row['title_kb']?>" class="btn btn-info"target="_blank" onclick="return confirm('Are you sure you want to view this KB Article ?')">Older Version</a>
											</td>
														<?php
															
											echo"</tr>";
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
// }
// header("location:index.php");
}
else
{
	header("location:error.php");
}
?>