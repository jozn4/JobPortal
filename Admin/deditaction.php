<?php
if (isset($_POST['submit']))
 {
    $id=$_POST['districtid'];
    $dname=$_POST['districtname'];
    $sql="UPDATE tbl_district set districtname='$dname' where districtid=$id";
    $result=$obj->executequery($sql);
    if ($result == 1)
    {
     echo "<script>alert('Saved Succesfully');window.location='districtview.php' </script>";
    }
    else
    {
     echo "<script>alert('Registration failed');window.location='districtview.php' </script>";
    }
}
?>