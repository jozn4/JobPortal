<?php
include_once("../dboperation.php");
$obj = new dboperation();

if (isset($_POST["submit"])) {
    $locationid = $_POST["h1"]; // Correct hidden input name
    $locationname = $_POST["txtname"]; // Correct text input name

    $sql = "UPDATE tbl_location SET locationname='$locationname' WHERE locationid='$locationid'";
    $result = $obj->executequery($sql);

    if ($result) {  // Removed "== 1", because query() returns TRUE or FALSE
        echo "<script>alert('Update Successful!'); window.location='location_view.php';</script>";
    } else {
        echo "<script>alert('Update Failed!'); window.location='location_view.php';</script>";
    }
}
?>