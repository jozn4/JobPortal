<?php
 include_once("../dboperation.php");
 $obj = new dboperation();
 $did=$_GET["eid"];
 $s="delete from tbl_district where districtid=$did";
 $res=$obj->executequery($s);
 if($res)
 {
echo "<script>alert('Delection Succesfully!!');window.location='districtview.php'</script>";
 }
 else
 {
   echo "<script>alert('delection faild!!');window.location='districtview.php'</script>"; 
 }
 ?>





