
<?php
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_POST['submit']))
{
$ln=$_POST["ln"];
$name=$_POST["uname"];
$lid=$_POST["location"];
$rdate=date('Y-m-d');
$cn=$_POST["cn"];
$username=$_POST["username"];
$password=$_POST["password"];
$des=$_POST["description"];
$status="requsted";
$img=$_FILES["photo"]["name"];
move_uploaded_file($_FILES["photo"]["tmp_name"], "../uploads/" . $img);
if(!$ln)
{
echo "<script>alert('data not entered!!'); window.location='register.php'</script>";
}
 else
 {
$sqlquery = "SELECT * FROM tbl_company WHERE licensenumber='$ln' and username='$username'";
$result= $obj->executequery($sqlquery);
$rows=mysqli_num_rows($result);
if($rows==1)
{
echo "<script>alert('Alrady Exist!!'); window.location='register.php'</script>";
}
else
 {
$sqlquery1="INSERT INTO tbl_company (name,photo,licensenumber,locationid,regdate,contactnum,username,password,status,description) VALUES('$name','$img','$ln','$lid','$rdate','$cn','$username','$password','$status','$des')";
$result1=$obj->executequery($sqlquery1);
        if($result1==1)
        {
           $cid=mysqli_insert_id($obj->con);
          echo "<script>alert('Registration Succesfully!!');window.location='login.php?'</script>";
    
        }
        else
        {
       echo "<script>alert('Registration Failed!!');window.location='register.php'</script>";
        }
 }
}
}
?>