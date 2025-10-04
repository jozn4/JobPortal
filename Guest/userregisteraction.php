
<?php
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_POST['submit']))
{
$email=$_POST['email'];
$name=$_POST["uname"];
$lid=$_POST["location"];
$rdate=date('Y-m-d');
$cn=$_POST["cn"];
$dob=$_POST["dob"];
$qf=$_POST["qualification"];
$username=$_POST["username"];
$password=$_POST["password"];
$img=$_FILES["photo"]["name"];
$status="processing";
move_uploaded_file($_FILES["photo"]["tmp_name"], "../uploads/" . $img);
if(!$name)
{
echo "<script>alert('data not entered!!'); window.location='userregister.php'</script>";
}
 else
 {
$sqlquery = "SELECT * FROM tbl_jobseeker WHERE username='$username'";
$result= $obj->executequery($sqlquery);
$rows=mysqli_num_rows($result);
if($rows==1)
{
echo "<script>alert('Alrady Exist!!'); window.location='userregister.php'</script>";
}
else
 {
$sqlquery1="INSERT INTO tbl_jobseeker(name,email,contactnum,qualification,photo,username,password,locationid,regdate,dob,status) VALUES('$name','$email','$cn','$qf','$img','$username','$password','$lid','$rdate','$dob','$status')";
$result1=$obj->executequery($sqlquery1);
        if($result1==1)
        {
          $cid=mysqli_insert_id($obj->con);
          echo "<script>alert('Registration Succesfully!!');window.location='planview.php?cid=$cid'</script>";
    
        }
        else
        {
       echo "<script>alert('Registration Failed!!');window.location='userregister.php'</script>";
        }
 }
}
}
?>