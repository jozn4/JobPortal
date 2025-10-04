
<?php
include("../dboperation.php");
$obj = new dboperation();

if(isset($_GET["id"])) {
    
    $jobid = $_GET["id"];
    $sql = "delete from tbl_companypost where postid=$jobid";
    $res = $obj->executequery($sql);
}
echo "<script>alert('Deleted Successfully!!');window.location='joblist.php'</script>";
?>

