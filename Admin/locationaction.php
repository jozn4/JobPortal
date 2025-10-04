<?php
include_once("../dboperation.php");
$obj = new dboperation();
$did=$_POST["districtid"];
$loc=$_POST["location"];
if(isset($_POST['submit']))
{
if(!$loc)
{
   echo "<script>alert('Location not entered!!'); window.location='location.php'</script>";
}
else
{
$sqlquery = "SELECT * FROM tbl_location WHERE locationname='$loc'";
$result= $obj->executequery($sqlquery);
$rows=mysqli_num_rows($result);
if($rows==1)
{
echo "<script>alert('Alrady Exist!!'); window.location='location.php'</script>";
}
else
{
$sqlquery1="INSERT INTO tbl_location (locationname,districtid) values('$loc','$did')";
$result1=$obj->executequery($sqlquery1);
        if($result1==1)
        {
          echo "<script>alert('Registration Succesfully!!');window.location='location.php'</script>";
    
        }
        else
        {
        echo "<script>alert('Registration Failed!!');window.location='location.php'</script>";
        }
 }
}
}
?>