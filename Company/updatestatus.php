<?php
include_once("../dboperation.php");
$obj = new dboperation();
    $rid = ($_GET['rid']);
    $status = $_GET['status'];
    if($status=='rejected')
    {
    $sql1="DELETE FROM tbl_request where requestid='$rid'";
    $result=$obj->executequery($sql1);
    }
    else
    {
   $sql1="UPDATE tbl_request set status='$status' where requestid='$rid'";
    $result=$obj->executequery($sql1);
    }
    if ($result == 1)
    {
     echo "<script>alert('Action Succesfully');window.location='requestview.php' </script>";
    }
    else
    {
     echo "<script>alert('failed');window.location='requestview.php' </script>";
    }
?>
