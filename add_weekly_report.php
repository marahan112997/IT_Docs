<?php
session_start();
$team=$_SESSION['team'];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Add Weekly Reports</title>
<link rel="stylesheet" href="css/add_remove.css" />
<script src="js/add_remove.js"></script>
<script src="js/add_remove2.js"></script>
<link rel="shortcut icon" href="logo.jpg">
</head>
<body>

<input type="hidden" id="team" name="team" value="<?php echo $team;?>">	
<form action="register_weekly.php" method="post" enctype="multipart/form-data">
	<div class="container">	
		<label>Week Number</label>
		<div class="form-group col-md-12">
		<select name="week_number"  class="form-control" style="width:20%" required/>
			<?php
			for ($x = 1; $x <= 52; $x++) {
			  echo '<option value="'.$x.'" selected>'.$x.'</option>';
			}
			?>
			<option value="" selected="selected" disabled="disabled">-- Select Week Number --</option>
		</select>

				
	</br>
		<table class="table table-bordered" id="dynamic_field">
			<th>File</th>
			<th>Site</th>
			<th>Report</th>
			<th>Action</th>
			<tr>
					<td><input type="file" name="file_array[]"></td>
					<td><select name="site[]"  class="form-control name_list" required />
						<option value="" selected="selected" disabled="disabled">-- Select Site --</option>
						<?php
					if($team=='Network'){	
						
						echo '<option value="Jaka & G2">Jaka & G2</option>';
						echo '<option value="Davao & Taipei & Xiamen">Davao & Taipei & Xiamen</option>';

					}else{
						echo '<option value="Jaka">Jaka</option>';
						echo '<option value="G2">G2</option>';
						echo '<option value="Davao">Davao</option>';
						echo '<option value="Taipei">Taipei</option>';
						echo '<option value="Xiamen">Xiamen</option>';
					}
					echo '</select></td>';
					echo '<td><select name="report[]"  class="form-control name_list" required />';
						echo '<option value="" selected="selected" disabled="disabled" required >-- Select Report --</option>';

						if($team=='Network'){	
							echo '<option value="Uptime and Latency">Uptime and Latency</option>';
							echo '<option value="Hardware Performance">Hardware Performance</option>';
							echo '<option value="Bandwidth Utilization">Bandwidth Utilization</option>';
						}
						if($team=='Server'){	
							echo '<option value="Uptime and Latency">Uptime and Latency</option>';
							echo '<option value="Hardware Performance">Hardware Performance</option>';

						}

						if($team=='Site Security'){	
						echo '<option value="Site Security">Site Security</option>';

						}

						if($team=='DSE'){	
						echo '<option value="Weekly Report Helpdesk">Weekly Report Helpdesk</option>';

						}

						if($team=='IT Asset'){	
						echo '<option value="GL Report">GL Report</option>';

						}

					echo '</select></td>';
					echo '<td><button type="button" name="add" id="add" class="btn btn-success">Add Files</button></td>';
					?>
			</tr>
		</table>
		<center>
			<a href="weekly_report.php" class="btn btn-danger">Cancel</a>
			<input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
		</center>
	</div>
</form>
</div>
</body>
</html>


<script>
$(document).ready(function(){
	var i=1;
	var team =$('#team').val();
	console.log(team);
	$('#add').click(function(){
		i++;
		
		
		var html = '';
		  html += '<tr id="row'+i+'">';
		  html += '<td><input type="file" name="file_array[]"></td>';

		if(team=='Network'){
		  html += '<td><select name="site[]" class="form-control site required"><option value="" selected="selected" disabled="disabled">-- Select Site --</option><option value="Jaka & G2">Jaka & G2</option><option value="Davao & Taipei & Xiamen">Davao & Taipei & Xiamen</option></select></td>';
		}else{
			html += '<td><select name="site[]" class="form-control site required"><option value="" selected="selected" disabled="disabled">-- Select Site --</option><option value="Jaka">Jaka</option><option value="G2">G2</option><option value="Davao">Davao</option><option value="Taipei">Taipei</option><option 	value="Xiamen">Xiamen</option></select></td>';
		}  




		if(team=='Network'){
		  html += '<td><select name="report[]" class="form-control report" required><option value="" selected="selected" disabled="disabled" required >-- Select Report --</option><option value="Uptime and Latency">Uptime and Latency</option><option value="Hardware Performance">Hardware Performance</option><option value="Bandwidth Utilization">Bandwidth Utilization</option></select></td>';
		}  

		if(team=='Server'){
		  html += '<td><select name="report[]" class="form-control report" required><option value="" selected="selected" disabled="disabled" required >-- Select Report --</option><option value="Uptime and Latency">Uptime and Latency</option><option value="Hardware Performance">Hardware Performance</option></select></td>';
		}


		if(team=='DSE'){
		  html += '<td><select name="report[]" class="form-control report" required><option value="" selected="selected" disabled="disabled" required >-- Select Report --</option><option value="Helpdesk Performance">Helpdesk Performance</option></select></td>';
		}


		if(team=='Site Security'){
		  html += '<td><select name="report[]" class="form-control report" required><option value="" selected="selected" disabled="disabled" required >-- Select Report --</option><option value="Site Security">Site Security</option></select></td>';
		}


		if(team=='IT Asset'){
		  html += '<td><select name="report[]" class="form-control report" required><option value="" selected="selected" disabled="disabled" required >-- Select Report --</option><option value="GL Report">GL Report</option></select></td>';
		}

		







		  html += '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Remove</button></td></tr>';
		  $('#dynamic_field').append(html);
	});
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});	
});
</script>