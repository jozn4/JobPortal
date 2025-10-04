
<?php
include("../dboperation.php");
$obj = new dboperation();

if(isset($_GET["eid"])) {
    
    $catid = $_GET["eid"];

    $sql = "select * from tbl_jobtype where jobtypeid=$catid";
    $res = $obj->executequery($sql);
    $display = mysqli_fetch_array($res);
    $sql = "delete from tbl_jobtype where jobtypeid=$catid";
    $res = $obj->executequery($sql);
}

echo "<script>alert('Deleted Successfully!!');window.location='categoryview.php'</script>";
?>

