<?php
include_once("../dboperation.php");
$obj=new dboperation();
    $id=$_GET["eid"];
    $status="accepted";
    $sql = "select * from tbl_company where companyid=$id";
    $res = $obj->executequery($sql);
    $display = mysqli_fetch_array($res);

    // Store the image filenames in an array
    $imageFiles = ["../uploads/" . $display["photo"]];

    // Delete each image file from the array
    foreach ($imageFiles as $file)
    {
        if (file_exists($file)) {
            unlink($file);
        }
    }

    $sql1="DELETE from tbl_company where companyid='$id'";
    $result=$obj->executequery($sql1);
    if ($result == 1)
    {
     echo "<script>alert('accepted Succesfully');window.location='companyview.php' </script>";
    }
    else
    {
     echo "<script>alert('failed');window.location='companyview.php' </script>";
    }
?>





