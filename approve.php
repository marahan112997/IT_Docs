<?php
include'dbcon.php';
session_start();
if (isset($_SESSION['username']))
	
{

	$id=$_GET['id'];
	$temp_number=$_GET['temp_number'];
	$date_approve = date("Y-m-d");
	
	if($temp_number==""){

		$queryr= mysqli_query ($conn,"Select * FROM tbl_kb WHERE kb_id='$id'");
			while($row= mysqli_fetch_assoc($queryr)){
				$kb_type=$row['kb_type'];
				//$team=$row['team'];
			}
	
			
			$parse=explode('-',$date_approve);
			$name=$_SESSION['firstname'].' '.$_SESSION['lastname'];

			
			
			

		if($kb_type=='DSE'){
			$result_parse='KB-DSE'.'-'.$parse[0].'-'.$parse[1];
			$result_parse2='KB-DSE'.'-'.$parse[0].'-'.$parse[1].'-'.$parse[2];
			$result=mysqli_query($conn,"SELECT count(*) as total from tbl_kb WHERE kb_number LIKE '%$result_parse%' AND kb_number NOT LIKE '%-V%'");
			$data=mysqli_fetch_assoc($result);
			$data['total'];
			$data2=$data['total']+1;
			
			$kb_number=$result_parse2.'-'.$data2;
		
			
		}

		if($kb_type=='Server'){
			$result_parse='KB-SVR'.'-'.$parse[0].'-'.$parse[1];
			$result_parse2='KB-SVR'.'-'.$parse[0].'-'.$parse[1].'-'.$parse[2];
			$result=mysqli_query($conn,"SELECT count(*) as total from tbl_kb WHERE  kb_number LIKE '%$result_parse%' AND kb_number NOT LIKE '%-V%'");
			$data=mysqli_fetch_assoc($result);
			$data['total'];
			$data2=$data['total']+1;
			
			
			$kb_number=$result_parse2.'-'.$data2;
			
		}

		if($kb_type=='Network'){
			
			$result_parse='KB-NOC'.'-'.$parse[0].'-'.$parse[1];
			$result_parse2='KB-NOC'.'-'.$parse[0].'-'.$parse[1].'-'.$parse[2];
			$result=mysqli_query($conn,"SELECT count(*) as total from tbl_kb WHERE kb_number LIKE '%$result_parse%' AND kb_number NOT LIKE '%-V%'");
			$data=mysqli_fetch_assoc($result);
			$data['total'];
			$data2=$data['total']+1;
			$kb_number=$result_parse2.'-'.$data2;
		}
		if($kb_type=='IT Asset'){
			
			$result_parse='KB-IAM'.'-'.$parse[0].'-'.$parse[1];
			$result_parse2='KB-IAM'.'-'.$parse[0].'-'.$parse[1].'-'.$parse[2];
			$result=mysqli_query($conn,"SELECT count(*) as total from tbl_kb WHERE kb_number LIKE '%$result_parse%'");
			$data=mysqli_fetch_assoc($result);
			$data['total'];
			$data2=$data['total']+1;
			$kb_number=$result_parse2.'-'.$data2;
		}
		if($kb_type=='Site Security'){
			
			$result_parse='KB-SEC'.'-'.$parse[0].'-'.$parse[1];
			$result_parse2='KB-SEC'.'-'.$parse[0].'-'.$parse[1].'-'.$parse[2];
			$result=mysqli_query($conn,"SELECT count(*) as total from tbl_kb WHERE kb_number LIKE '%$result_parse%'");
			$data=mysqli_fetch_assoc($result);
			$data['total'];
			$data2=$data['total']+1;
			$kb_number=$result_parse.'-'.$data2;
		}
			mysqli_query($conn,"UPDATE tbl_kb SET kb_status='Approved' ,date_approve='$date_approve',kb_number='$kb_number',status='$name' WHERE kb_id='$id'");
			mysqli_query($conn, "INSERT INTO tbl_audittrail(audit_trail_ID, name, Date_Time_action,action)VALUES('','$name', '$date_approve', 'Approved a KB Article')");
			header('location:for_approval.php');
	}else{
	mysqli_query($conn,"UPDATE tbl_kb SET kb_status='Approved' ,date_approve='$date_approve',kb_number='$temp_number',status='$name' WHERE kb_id='$id'");	
	header('location:for_approval.php');
	}
}
else
{
	header("location:error.php");
}
?>	