
<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_POST['submit']))
{
$name=$_POST["pname"];
$jobtype=$_POST["jobtype"];
$cid=$_SESSION["Login_id"];
$jobtypeid=$_POST["jobtypeid"];
$rdate=date('Y-m-d');
$criteria=$_POST["criteria"];
$enddate=$_POST["enddate"];
$jobdes=$_POST["jobdescription"];

if(!$name)
{
echo "<script>alert('data not entered!!'); window.location='postregister.php'</script>";
}
 else
 {
$sqlquery = "SELECT * FROM tbl_companypost WHERE postname='$name'";
$result= $obj->executequery($sqlquery);
$rows=mysqli_num_rows($result);
if($rows==1)
{
echo "<script>alert('Alrady Exist!!'); window.location='postregister.php'</script>";
}
else
 {
$sqlquery1="INSERT INTO tbl_companypost (postname,companyid,postdate,criteria,enddate,jobtypeid,jobtime,jobdescription) VALUES('$name','$cid','$rdate','$criteria','$enddate','$jobtypeid','$jobtype','$jobdes')";
$result1=$obj->executequery($sqlquery1);
        if($result1==1)
        {
         echo "<script>alert('Registration Succesfully!!');window.location='postregister.php'</script>";
    
        }
        else
        {
       echo "<script>alert('Registration Failed!!');window.location='postregister.php'</script>";
        }
 }
}
}
?>