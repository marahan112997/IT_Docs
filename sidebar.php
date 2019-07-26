<?php
include'dbcon.php';
?>


<ul class="sidebar navbar-nav" style="background-color:#001b35;">

</br>
	<b style="color:white; text-align: center;">IT Library</b>

        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        
		
		
		
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>KB Articles</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            
			
			<?php 
			if($_SESSION['privilege']=='Super Admin' OR $_SESSION['privilege']=='Team Leader'){

			?>
			
            <a class="dropdown-item" href="for_approval.php"><i class="fa fa-folder-open"></i>   <label style="color:#2A2A2A;font-family:arial;">  For Approval</label></a>


            <a class="dropdown-item" href="kbarticles.php"><i class="fa fa-folder-open"></i>   <label style="color:#2A2A2A;font-family:arial;">  All</label></a>
			

			<?php
			}
			?>

			<?php 
			if($_SESSION['privilege']!='Super Admin' OR $_SESSION['privilege']!='Team Leader'){

			?>
			
            <a class="dropdown-item" href="for_approval_kb.php"><i class="fa fa-folder-open"></i>   <label style="color:#2A2A2A;font-family:arial;">  For Approval</label></a>
			

			<?php
			}
			?>
			
			
            <a class="dropdown-item" href="kbarticles_dse.php"><i class="fa fa-folder-open"></i>  <label style="color:#2A2A2A;font-family:helvetica;">   DSE</label></a>
			
			
			<?php 
			if($_SESSION['team']=='Network' OR $_SESSION['privilege']=='Super Admin' OR $_SESSION['privilege']=='Team Leader'){
			?>
            <a class="dropdown-item" href="kbarticles_network.php"><i class="fa fa-folder-open"></i>   <label style="color:#2A2A2A;font-family:helvetica;">   Network</label></a>
			
			
			<?php
			}
			?>
			
			<?php 
			if($_SESSION['team']=='Server' OR $_SESSION['privilege']=='Super Admin' OR $_SESSION['privilege']=='Team Leader'){
			?>
            <a class="dropdown-item" href="kbarticles_server.php"><i class="fa fa-folder-open"></i>   <label style="color:#2A2A2A;font-family:helvetica;">   Server</label></a>
			
			<?php
			}
			?>
			<?php 
			if($_SESSION['team']=='IT Asset' OR $_SESSION['privilege']=='Super Admin'){
			?>
            <a class="dropdown-item" href="asset.php"><i class="fa fa-folder-open"></i>   <label style="color:#2A2A2A;font-family:helvetica;">   IT Asset</label></a>
			
			<?php
			}
			?>
			
			<?php 
			if($_SESSION['team']=='Site Security' OR $_SESSION['privilege']=='Super Admin'){
			?>
            <a class="dropdown-item" href="sitesecurity.php"><i class="fa fa-folder-open"></i>   <label style="color:#2A2A2A;font-family:helvetica;">   Site Security</label></a>
			
			<?php
			}
			?>
         
            	<a class="dropdown-item" href="kb_rejected.php"><i class="fa fa-folder-open"></i>   <label style="color:#2A2A2A;font-family:helvetica;">   Disapproved KB</label></a>
          </div>
        </li>
       
		
		<li class="nav-item">
         	<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            <i class="fa fa-file-archive"></i>
	            <span>IT Procedures</span></a>
				<div class="dropdown-menu" aria-labelledby="pagesDropdown">
					<a class="dropdown-item" href="policy.php"><i class="fa fa-file-archive"></i>   <label style="color:#2A2A2A;font-family:helvetica;">    New Procedures</label></a>
					<a class="dropdown-item" href="oldpolicy.php"><i class="fa fa-file-archive"></i>   <label style="color:#2A2A2A;font-family:helvetica;">     Old Procedures</label></a>
			 
				</div>
			</a>	
		
        </li>

        

        <li class="nav-item">
         	<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            <i class="fas fa-briefcase"></i>
	            <span>Change Docs</span></a>
				<div class="dropdown-menu" aria-labelledby="pagesDropdown">

					<?php
					if($_SESSION['privilege']=='Super Admin'){
					?>
					<a class="dropdown-item" href="changedocs.php"><i class="fas fa-briefcase"></i>   <label style="color:#2A2A2A;font-family:helvetica;"
					>    For Approval</label></a>
					<?php

					}
					?>

					<?php
					if($_SESSION['privilege']!='Super Admin'){
					?>
					<a class="dropdown-item" href="for_approval_changedocs.php"><i class="fas fa-briefcase"></i>   <label style="color:#2A2A2A;font-family:helvetica;"
					>    For Approval</label></a>
					<?php

					}
					?>

					<a class="dropdown-item" href="latest_approved_changedocs.php"><i class="fas fa-briefcase"></i>   <label style="color:#2A2A2A;font-family:helvetica;">     All Docs</label></a>

					<!--<a class="dropdown-item" href="upload_changedocs.php"><i class="fa fa-file-archive"></i>   <label style="color:#2A2A2A;font-family:helvetica;">     Pending Documents</label></a>-->
					
					<a class="dropdown-item" href="rejected_changedocs.php"><i class="fas fa-briefcase"></i>   <label style="color:#2A2A2A;font-family:helvetica;">     Disapproved Docs</label></a>
			 
				</div>
			</a>	
		
        </li>

        <li class="nav-item">
         	<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            <i class="fas fa-tasks"></i>
	            <span>Weekly Reports</span></a>
				<div class="dropdown-menu" aria-labelledby="pagesDropdown">

					<?php
					if($_SESSION['privilege']=='Super Admin'){
					?>
					<a class="dropdown-item" href="forapproval_reports.php"><i class="fas fa-tasks"></i>   <label style="color:#2A2A2A;font-family:helvetica;">    For Approval</label></a>
					<?php

					}else{
						echo'<a class="dropdown-item" href="pending_weekly.php"><i class="fas fa-tasks"></i>   <label style="color:#2A2A2A;font-family:helvetica;">    For Approval</label></a>';
					}
					?>

					<a class="dropdown-item" href="weekly_report.php"><i class="fas fa-tasks"></i>   <label style="color:#2A2A2A;font-family:helvetica;">     Approved</label></a>

					<!--<a class="dropdown-item" href="upload_changedocs.php"><i class="fa fa-file-archive"></i>   <label style="color:#2A2A2A;font-family:helvetica;">     Pending Documents</label></a>-->
				
					<a class="dropdown-item" href="rejected_weekly.php"><i class="fas fa-tasks"></i>   <label style="color:#2A2A2A;font-family:helvetica;">     Disapproved</label></a>
			 
				</div>
			</a>	
		
        </li>


        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-briefcase"></i>
            <span><label style="font-family:helvetica;">Baselines</label></span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="ser_view.php">
            <i class="fas fa-lock"></i>
            <span><label style="font-family:helvetica;">  SER</label></span></a>
        </li>
    </br>

       

        <?php 
        
		if($_SESSION['privilege']=='Super Admin' OR $_SESSION['privilege']=='Team Leader'){
			 echo'<b style="color:white; text-align: center;">System</b>';
		?>
        <li class="nav-item">
          <a class="nav-link" href="accounts.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Accounts</span></a>
        </li>
		
		<?php
			}
		?>

		</br>

        
		<?php 
		
		if($_SESSION['privilege']=='Super Admin' OR $_SESSION['privilege']=='Team Leader DSE' OR $_SESSION['privilege']=='Team Leader Network' OR $_SESSION['privilege']=='Team Leader Systems'){
			echo '<b style="color:white; text-align: center;">Reporting</b>';
		?>
		<li class="nav-item">
          <a class="nav-link" href="reports.php">
            <i class="fas fa-briefcase"></i>
            <span><label style="font-family:helvetica;">KB Submission</label></span></a>
        </li>
		<?php
			}
			?>
		

      </ul>