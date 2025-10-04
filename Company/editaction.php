<?php
include_once("../dboperation.php");
$obj = new dboperation();
if (isset($_POST['submit']))
     {
    $name=$_POST["pname"];
$jobtype=$_POST["jobtype"];
$jobtypeid=$_POST["jobtypeid"];
$rdate=date('Y-m-d');
$criteria=$_POST["criteria"];
$enddate=$_POST["enddate"];
     $jobid = $_POST["postid"];
 
     $sqlquery = "UPDATE tbl_companypost 
                     SET postname='$name',  
                         postdate='$rdate', 
                         criteria='$criteria', 
                         enddate='$enddate', 
                         jobtypeid='$jobtypeid', 
                         jobtime='$jobtype' 
                     WHERE postid='$jobid'";                
        $result = $obj->executequery($sqlquery);
        if ($result) {
            echo "<script>alert('Updated successfully!'); window.location='joblist.php'</script>";
        } else {
            echo "<script>alert('Update failed!'); window.location='jobedit.php?id=$postid'</script>";
    }
}
?>


