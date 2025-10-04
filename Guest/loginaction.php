<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();
$username = $_POST["username"];
$password = $_POST["password"];
$sqlquery = "SELECT * from tbl_adminlogin where username='$username' and password='$password'";
$result= $obj->executequery($sqlquery);
if(mysqli_num_rows($result) == 1) 
{
   $row = mysqli_fetch_array($result);
   $_SESSION["User_name"] = $username;
   $_SESSION["Login_id"] =$row["loginid"];
   header("location:..\Admin\index.php");
} 

$sqlquery="SELECT * from tbl_jobseeker where username='$username' AND password='$password'";
$result= $obj->executequery($sqlquery);
   if(mysqli_num_rows($result) == 1) 
   {   
   $row = mysqli_fetch_array($result);
        $sid = $row["jobseekerid"];  
        $renewalDate = $row['renewaldate'];
        $today = date('Y-m-d');
            if (!empty($renewalDate) && strtotime($renewalDate) < strtotime($today)) {
                echo "<script>alert('Your plan has expired. Please renew to continue.'); window.location='planview.php?cid=$sid';</script>";
            } else {
                $_SESSION["User_name"] = $username;
                $_SESSION["Login_id"] =$row["jobseekerid"];
                header("location:..\Jobseeker\index.php");
            }
   } 
//company login
 $sqlquery = "SELECT * from tbl_company where username='$username' and password='$password'";
$result= $obj->executequery($sqlquery);
if(mysqli_num_rows($result) == 1) 

{

       $row = mysqli_fetch_array($result);
        $sid = $row["companyid"];  
        $renewalDate = $row['renewaldate'];
        $today = date('Y-m-d');;
      $status=$row['status'];

        if ($status == "requsted") {
            echo "<script>alert('Your account is pending admin approval.'); window.location='login.php';</script>";
         
        } elseif ($status == "Rejected") {
            echo "<script>alert('Your account was rejected by admin.'); window.location='login.php';</script>";
         
        } elseif ($status == "accepted") {

            if (empty($row["plan_id"])) 
               {
            
                echo "<script>alert('Please choose a plan first.'); window.location='planviewc.php?cid=$sid';</script>";
            } 
             if (!empty($renewalDate) && strtotime($renewalDate) <= strtotime($today)) 
                {
                echo "<script>alert('Your plan has expired. Please renew to continue.'); window.location='planviewc.php?cid=$sid';</script>";
            }
             else 
            {
              $_SESSION["User_name"] = $username;
              $_SESSION["Login_id"] =$row["companyid"];
              header("location:..\Company\index.php");
            }
        }
    }
else
{
         // Invalid login, display an error message
         echo "<script>alert('Invalid Username/Password!!'); window.location='login.php'</script>";
      }
?>