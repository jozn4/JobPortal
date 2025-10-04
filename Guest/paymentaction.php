<?php
include_once("../dboperation.php");
$jid = $_POST['cid'];
$plan_id = $_POST['plan_id'];
$amount = $_POST['amount'];
$regdate = date("Y-m-d");
$obj = new dboperation();

$sql = "INSERT INTO tbl_paymentplan(plan_id, jobseekerid, amount, status, regdate) 
        VALUES ('$plan_id', '$jid', '$amount', 'Pending', '$regdate')";

$res = $obj->executequery($sql);

if ($res) 
    {
     echo "<script>alert('Plan selected successfully! Please proceed with payment.');window.location='paymentmain.php?cid=$jid'</script>";
} else {
    echo "<div class='container my-5'><div class='alert alert-danger'>Error while selecting plan.</div></div>";
}
?>
