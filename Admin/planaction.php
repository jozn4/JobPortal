<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_POST['submit']))
{
$name=$_POST["pname"];
$amount=$_POST["amount"];
$d=$_POST["duration"];

if(!$name)
{
   echo "<script>alert('Plan not entered!!'); window.location='plan.php'</script>";
}
else
{
$sqlquery = "SELECT * FROM tbl_plan WHERE plan_name='$name'";
$result= $obj->executequery($sqlquery);
$rows=mysqli_num_rows($result);
if($rows==1)
{
echo "<script>alert('Alrady Exist!!'); window.location='plan.php'</script>";
}
else
{
$sqlquery1="INSERT INTO tbl_plan (plan_name,amount,duration) values('$name','$amount','$d')";
$result1=$obj->executequery($sqlquery1);
        if($result1==1)
        {
          echo "<script>alert('Registration Succesfully!!');window.location='plan.php'</script>";
    
        }
        else
        {
        echo "<script>alert('Registration Failed!!');window.location='plan.php'</script>";
        }
 }
}
}
?>

