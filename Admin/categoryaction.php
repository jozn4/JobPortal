
<?php
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_POST['submit']))
{
$jname=$_POST["jobtypename"];
if(!$jname)
{
    echo "<script>alert('jobcategory not entered!!'); window.location='jobtype.php'</script>";
}
else
{
$sqlquery = "SELECT * FROM tbl_jobtype WHERE jobtypename='$jname'";
$result= $obj->executequery($sqlquery);
$rows=mysqli_num_rows($result);
if($rows==1)
{
echo "<script>alert('Alrady Exist!!'); window.location='jobtype.php'</script>";
}
else
 {
 $sqlquery1="INSERT INTO tbl_jobtype (jobtypename) VALUES('$jname')";
$result1=$obj->executequery($sqlquery1);
        if($result1==1)
        {
          echo "<script>alert('Registration Succesfully!!');window.location='jobtype.php'</script>";
    
        }
        else
        {
        echo "<script>alert('Registration Failed!!');window.location='jobtype.php'</script>";
        }
 }
}
}
?>