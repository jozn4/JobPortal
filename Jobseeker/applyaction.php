<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();
$postid=$_POST["pid"];
$sql= "SELECT companyid FROM tbl_companypost WHERE postid='$postid'";
$resultc= $obj->executequery($sql);
$rowCid = mysqli_fetch_assoc($resultc);
$cid = $rowCid['companyid'];
$jid=$_SESSION["Login_id"];
$status="requested";
$rdate=date('Y-m-d');
$resume = $_FILES['resume']['name']; 
move_uploaded_file($_FILES["resume"]["tmp_name"], "../uploads/" . $resume);

if(isset($_POST['submit']))
{
$sqlquery = "SELECT * FROM tbl_request WHERE postid='$postid' AND jobseekerid='$jid'";
$result= $obj->executequery($sqlquery);
$rows=mysqli_num_rows($result);
if($rows==1)
{
echo "<script>alert('Alrady Exist!!'); window.location='index.php'</script>";
}
else
{
$sqlquery1="INSERT INTO tbl_request (postid,companyid,requestdate,status,biodata,jobseekerid) values('$postid','$cid','$rdate','$status','$resume','$jid')";
$result1=$obj->executequery($sqlquery1);
        if($result1)
        {
          echo "<script>alert('Registration Succesfully!!');window.location='index.php'</script>";
        }
        else
        {
        echo "<script>alert('Registration Failed!!');window.location='index.php'</script>";
        }
 }
}
?>

