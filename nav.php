

<nav class="navbar navbar-expand navbar bg static-top" style="background-color:#1a8fcb;">

      <a class="navbar-brand mr-1" href="index.php"><img src="logo.png" height="35" width="35">  <b style="color:#ffffff;font-family:helvetica;">IT Documents Library</b></a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
	  
		<?php
		include'dbcon.php';
		if($_SESSION['privilege']=='Super Admin'){
			
			?>
			<?php 
			$type=$_SESSION['team'];
			$queryr= mysqli_query ($conn,"Select * FROM tbl_kb WHERE kb_status !='Approved' AND kb_status!='Disapproved'");
						$count=0;
				while($row= mysqli_fetch_assoc($queryr)){
					$count++;
				}
			?>
												
		   <li class="nav-item dropdown no-arrow mx-1" >
			  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#ffffff;">
				<i class="fas fa-fw fa-folder" title="KB Articles"></i>
				
			
			<?php
				if($count!='0'){
			?>
				<span class="badge badge-danger"><?php echo $count;?></span>
			
			<?php
				}
			?>
			  </a>
			  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
				<a class="dropdown-item" href="for_approval.php">For Approval KB Articles</a>
				
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="kb_approved.php">Approved KB Articles</a>
			  </div>
			</li>
			
		<?php
		}

		
		if($_SESSION['privilege']=='Team Leader'){
			
			?>
			<?php 
			$type=$_SESSION['team'];
			$fullname=$_SESSION['firstname'].' '.$_SESSION['lastname'];
			$queryr= mysqli_query ($conn,"Select * FROM tbl_kb WHERE kb_status!='Approved' AND kb_status!='Disapproved' AND kb_type='$type' AND kb_author!='$fullname'");
						$count=0;
				while($row= mysqli_fetch_assoc($queryr)){
					$count++;
				}
			?>
												
		   <li class="nav-item dropdown no-arrow mx-1">
			  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#ffffff;">
				<i class="fas fa-fw fa-folder"></i>
				
			
			<?php
				if($count!='0'){
			?>
				<span class="badge badge-danger"><?php echo $count;?></span>
			
			<?php
				}
			?>
			  </a>
			  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
				<a class="dropdown-item" href="for_approval.php">For Approval KB Articles</a>
				
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="kb_approved.php">Approved KB Articles</a>
			  </div>
			</li>
			
		<?php
		}
		?>
			

			<?php
			if($_SESSION['privilege']=='Super Admin'){				
 
				$type=$_SESSION['team'];
				$queryr= mysqli_query ($conn,"Select * FROM tbl_changedocs WHERE status ='Pending'");
							$count=0;
					while($row= mysqli_fetch_assoc($queryr)){
						$count++;
					}
			?>
														
				   <li class="nav-item dropdown no-arrow mx-1">
					  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#ffffff;">
						<i class="fas fa-briefcase" title="Change Documents"></i>
						
					
					<?php
						if($count!='0'){
					?>
						<span class="badge badge-danger"><?php echo $count;?></span>
					
					<?php
						}
					?>
					  </a>
					  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
						<a class="dropdown-item" href="changedocs.php">For Approval Changedocs</a>
						
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="latest_approved_changedocs.php">All Changedocs</a>
					  </div>
					</li>
					
			<?php
			}
			?>

			<?php
			if($_SESSION['privilege']=='Super Admin'){				
				$type=$_SESSION['team'];
				$queryr= mysqli_query ($conn,"Select * FROM tbl_ser WHERE updated_file!='true'");
							$count_ser=0;
					while($row= mysqli_fetch_assoc($queryr)){
						$approved_date=$row['approved_date'];
                    	$expiration_date=$row['expiration_date'];
						$approved_date=date_create(date("Y-m-d"));
	                    $expiration_date=date_create($expiration_date);
	                    $diff=date_diff($approved_date,$expiration_date);
	                    $days=$diff->format("%R%a Days");
	                    $days=str_replace("+", "", $days);
	                    $days_replace=str_replace("Days", "", $days);

	                    if($days_replace<=30){
	                    	$count_ser++;
	                    }
					}
			?>
														
				   <li class="nav-item dropdown no-arrow mx-1">
					  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#ffffff;">
						<i class="fas fa-lock" title="SER"></i>
						
					
					<?php
						if($count_ser!='0'){
					?>
						<span class="badge badge-danger"><?php echo $count_ser;?></span>
					
					<?php
						}
					?>
					  </a>
					  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">	
						<a class="dropdown-item" href="ser_view.php">View all SER</a>
					  </div>
					</li>
					
			<?php
			}
			




			if($_SESSION['privilege']=='Super Admin'){
			
			?>
			<?php 
			$type=$_SESSION['team'];
			$queryr= mysqli_query ($conn,"Select * FROM weekly_report WHERE status='Pending'");
						$count=0;
				while($row= mysqli_fetch_assoc($queryr)){
					$count++;
				}
			?>
												
		   <li class="nav-item dropdown no-arrow mx-1" >
			  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#ffffff;">
				<i class="fas fa-tasks" title="Weekly Report"></i>
				
			
			<?php
				if($count!='0'){
			?>
				<span class="badge badge-danger"><?php echo $count;?></span>
			
			<?php
				}
			?>
			  </a>
			  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
				<a class="dropdown-item" href="forapproval_reports.php">For Weekly Reports</a>
				
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="weekly_report.php">Approved Weekly Reports</a>
			  </div>
			</li>
			
		<?php
		}
		?>


		
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#ffffff;">
           <b style="color:#ffffff;font-family:helvetica;"> <?php echo $_SESSION['username'];?></b>   <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a href = "editaccount.php?id=<?php echo $_SESSION['user_ID']?>" class="dropdown-item" >Change Password</a>
			
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>