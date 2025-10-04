<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_POST['submit']))
{
$dis=$_POST["districtname"];
if(!$dis)
{
   echo "<script>alert('District not entered!!'); window.location='district.php'</script>";
}
else
{
$sqlquery = "SELECT * FROM tbl_district WHERE districtname='$dis'";
$result= $obj->executequery($sqlquery);
$rows=mysqli_num_rows($result);
if($rows==1)
{
echo "<script>alert('Alrady Exist!!'); window.location='district.php'</script>";
}
else
{
$sqlquery1="INSERT INTO tbl_district (districtname) values('$dis')";
$result1=$obj->executequery($sqlquery1);
        if($result1==1)
        {
          echo "<script>alert('Registration Succesfully!!');window.location='district.php'</script>";
    
        }
        else
        {
        echo "<script>alert('Registration Failed!!');window.location='district.php'</script>";
        }
 }
}
}
?>

