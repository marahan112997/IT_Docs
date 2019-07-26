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

        
              <ol class="breadcrumb">
                <i class="fas fa-search"> Search Weekly Report</i>
              </ol>
<form action="weekly_report.php" method="POST">
  <center>
    <div class="row">
      <div class="column" style="width: 50%;">
        <select name="week_number"  class="form-control" required style="width:50%"/>
          <?php
          for ($x = 1; $x <= 52; $x++) {
            echo '<option value="'.$x.'" selected>'.$x.'</option>';
          }
          ?>
          <option value="ALL" selected="selected">--- Select Week Number ---</option>
        </select>
      </div>  

      <div class="column" style="width: 50%;">
        <select name="team"  class="form-control" required style="width:50%" />
          <option value="Server" selected="selected" >Server Operation</option>
          <option value="Network" selected="selected" >Network Operation</option>
          <option value="Site Security" selected="selected" >Site Security</option>
          <option value="DSE" selected="selected" >Desktop Support Engineer </option>
          <option value="asset" selected="selected" >IT Asset</option>
          <option value="ALL" selected="selected">--- Team ---</option>
        </select>
      </div>  
    </div>
  </br>
    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
    </br>
    </br>
    </br>

  </center>
</form>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-tasks"></i>
              Approved Weekly Report</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
          						<th hidden>#</th>
          						<th>Week Number</th>
          						<th>Site</th>
          						<th>Report Type</th>
          						<th>Status</th>
          						<th>Author</th>
                      <th>Team</th>
          						<th>Actions</th>
                    </tr>
						</thead>
							<tbody>
								<?php
									include'dbcon.php';
                  if(isset($_POST['submit'])){

                    $week_number=$_POST['week_number'];
                    $team=$_POST['team'];

                    if($week_number=="ALL" AND $team=="ALL"){
                      $queryr= mysqli_query ($conn,"Select * FROM weekly_report WHERE status='Approved' ORDER BY week_number DESC");
                    }
                    if($week_number!="ALL" AND $team!="ALL"){
                      $queryr= mysqli_query ($conn,"Select * FROM weekly_report WHERE status='Approved' AND week_number='$week_number' AND team='$team' ORDER BY week_number DESC");
                    }
                    if($week_number!="ALL" AND $team=="ALL"){
                      $queryr= mysqli_query ($conn,"Select * FROM weekly_report WHERE status='Approved' AND week_number='$week_number' ORDER BY week_number DESC");
                    }
                    if($week_number=="ALL" AND $team!="ALL"){
                      $queryr= mysqli_query ($conn,"Select * FROM weekly_report WHERE status='Approved' AND team='$team' ORDER BY week_number DESC");
                    }
                      $ctr=1;
                    while($row= mysqli_fetch_assoc($queryr)){

                      echo "<tr>";
                        echo '<td hidden>'.$ctr.'</td>';
                        echo '<td>'.$row['week_number'].'</td>';
                        echo '<td>'.$row['site'].'</td>';
                        echo '<td>'.$row['report_type'].'</td>';
                        echo '<td>'.$row['status'].'</td>';
                        echo '<td>'.$row['author'].'</td>';
                        echo '<td>'.$row['team'].'</td>';
                        $ctr++;
                      echo "<td>";
                      $title=$row['temp_title'];
                      
                      echo "<a href='result4.php?id=$title' target='_blank' class='btn btn-primary btn-square' title='View Weekly Report'><i class='fa fa-eye'></i></button></a>";
                      echo "</td>";
                      ?>
                      
                      
                      <?php
                      echo"</tr>";
                    }
                  }else{
									$queryr= mysqli_query ($conn,"Select * FROM weekly_report WHERE status='Approved' ORDER BY week_number DESC");
												$ctr=1;
										while($row= mysqli_fetch_assoc($queryr)){
											echo"<tr>";
											echo '<td hidden>'.$ctr.'</td>';
											echo '<td>'.$row['week_number'].'</td>';
											echo '<td>'.$row['site'].'</td>';
											echo '<td>'.$row['report_type'].'</td>';
											echo '<td>'.$row['status'].'</td>';
											echo '<td>'.$row['author'].'</td>';
                      echo '<td>'.$row['team'].'</td>';
											$ctr++;
											echo "<td>";


											$title=$row['temp_title'];
											
											
											
											
											echo "<a href='result4.php?id=$title' target='_blank' class='btn btn-primary btn-square' title='View Weekly Report'><i class='fa fa-eye'></i></button></a>";
											echo "</td>";
											?>
											
											
											<?php
											echo"</tr>";
										}
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