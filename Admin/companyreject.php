<?php
include_once("../dboperation.php");
$obj=new dboperation();
    $id=$_GET["eid"];
    $status="Rejected";
    $sql1="UPDATE tbl_company set status='$status' where companyid='$id'";
    $result=$obj->executequery($sql1);
    if ($result == 1)
    {
     echo "<script>alert('Rejected Succesfully');window.location='companyview.php' </script>";
    }
    else
    {
     echo "<script>alert('failed');window.location='companyview.php' </script>";
    }
?>