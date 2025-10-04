<?php
include_once("../dboperation.php");
$obj=new dboperation();
if (isset($_POST['submit']))
 {
    $id=$_POST['jobtypeid'];
    $Category_name=$_POST['jobtypename'];
    $sql1="UPDATE tbl_jobtype set jobtypename='$Category_name' where jobtypeid=$id";
    $result=$obj->executequery($sql1);
    if ($result == 1)
    {
     echo "<script>alert('Saved Succesfully');window.location='categoryview.php' </script>";
    }
    else
    {
     echo "<script>alert('Registration failed');window.location='categoryview.php' </script>";
    }
}
?>