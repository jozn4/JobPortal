<?php
 include_once("../dboperation.php");
 $obj = new dboperation();
 $pid=$_GET["pid"];
 $s="delete from tbl_plan where plan_id=$pid";
 $res=$obj->executequery($s);
 if($res)
 {
echo "<script>alert('Delection Succesfully!!');window.location='planview.php'</script>";
 }
 else
 {
   echo "<script>alert('delection faild!!');window.location='planview.php'</script>"; 
 }
 ?>





