<?php
if(isset($_FILES['file_array'])){
    include'dbcon.php';
    session_start();

    $week_number=$_POST['week_number'];
    if($week_number==NULL){
        $ddate = date("Y-m-d");
        $date = new DateTime($ddate);
        $week_number = $date->format("W");
        $week_number=$week_number-1;
    }


    $fullname=$_SESSION['firstname'].' '.$_SESSION['lastname'];
    $team=$_SESSION['team'];
    $name_array = $_FILES['file_array']['name'];
    $tmp_name_array = $_FILES['file_array']['tmp_name'];
    $ddate = date("Y-m-d");
    $duedt = explode("-", $ddate);
    $date  = mktime(0, 0, 0, $duedt[1], $duedt[2], $duedt[0]);
    $week  = (int)date('W', $date);
    
   
    for($i = 0; $i < count($tmp_name_array); $i++){
        $file_explode=explode('.',$name_array[$i]);
        $file_explode=end($file_explode);
        $site=$_POST['site'];
        $site_insert=$site;
        $site_insertion=$site_insert[$i];

        $report=$_POST['report'];
        $report_insert=$report;
        $report_insertion=$report_insert[$i];
        
        if (strpos($file_explode, 'pdf') !== false) {   
            $name=uniqid().'.pdf';
            if(move_uploaded_file($tmp_name_array[$i], "weekly/".$name)){

                echo $name_array[$i]." upload is complete<br>";
                echo "<script type='text/javascript'>alert('New File Uploaded');</script>";
                mysqli_query($conn, "INSERT INTO weekly_report(week_id, week_number, temp_title,site,report_type,status,author,team)VALUES('','$week_number', '$name', '$site_insertion', '$report_insertion','Pending','$fullname','$team')");
                header( "refresh:3;url=weekly_report.php" );

            }else {
                echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
                echo '<script type="text/javascript">alert("File Not Uploaded Minimum File size is 2MB");</script>';
            }
        }else{
            echo '<script type="text/javascript">alert("Please Upload a PDF File");</script>';
            echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
            header( "refresh:5;url=weekly_report.php" );
        }    
    }

}
?>