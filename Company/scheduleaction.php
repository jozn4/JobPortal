
<?php
include_once("../dboperation.php");
$obj = new dboperation();
$rid=$_POST["rid"];
$sdate=$_POST["schedule_date"];
$sql = "SELECT * FROM tbl_request where requestid='$rid'";
$result = $obj->executequery($sql);
 $row = mysqli_fetch_assoc($result);
        $pid = $row['postid'];
        $cid = $row['companyid'];
        $jobid  = $row['jobseekerid'];
        $remark = "scheduled";
if(isset($_POST['submit']))
{
$sdate=$_POST["schedule_date"];
if(!$sdate)
{
echo "<script>alert('data not entered!!'); window.location='acceptedrequest.php'</script>";
}
 else
 {
$sqlquery = "SELECT * FROM tbl_schedule WHERE jobseekerid='$jobid' and companyid='$cid'";
$result= $obj->executequery($sqlquery);
$rows=mysqli_num_rows($result);
if($rows==1)
{
echo "<script>alert('Alrady Exist!!'); window.location='acceptedrequest.php'</script>";
}
else
 {
$sqlquery1="INSERT INTO tbl_schedule (jobseekerid,postid,companyid,scheduledate,remark) VALUES('$jobid','$pid','$cid','$sdate','$remark')";
$result1=$obj->executequery($sqlquery1);
        if($result1==1)
        {
          echo "<script>alert('Registration Succesfully!!');window.location='acceptedrequest.php'</script>";
    
        }
        else
        {
       echo "<script>alert('Registration Failed!!');window.location='acceptedrequest.php'</script>";
        }
 }
}
}
?>