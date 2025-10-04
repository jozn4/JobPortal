<?php
include_once("../dboperation.php");
$jid = $_POST['companyid'];
$plan_id = $_POST['plan_id'];
$amount = $_POST['amount'];
$regdate = date("Y-m-d");
$obj = new dboperation();
$sql2="SELECT * from tbl_paymentplanc where companyid='$jid'";
$res2 = $obj->executequery($sql2);
if ($res2) 
    {
     echo "<script>alert('Plan selected successfully! Please proceed with payment.');window.location='paymentmainc.php?cid=$jid'</script>";
     exit;
    }
$sql = "INSERT INTO tbl_paymentplanc(plan_id, companyid, amount, status, regdate) 
        VALUES ('$plan_id', '$jid', '$amount', 'Pending', '$regdate')";

$res = $obj->executequery($sql);

if ($res) 
    {
     echo "<script>alert('Plan selected successfully! Please proceed with payment.');window.location='paymentmainc.php?cid=$jid'</script>";
} else {
    echo "<div class='container my-5'><div class='alert alert-danger'>Error while selecting plan.</div></div>";
}
?>
