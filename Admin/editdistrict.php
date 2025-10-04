<?php
 include("header.php");
 include_once("../dboperation.php");
 $obj = new dboperation();
 if(isset($_GET['eid']))
 {
    $cid=$_GET['eid'];
    $sql="select * from tbl_district where districtid='$cid'";
    $res=$obj->executequery($sql);
    $r=mysqli_fetch_array($res);
 }
 ?>
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Update District </h6>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">District</label>
                                    <input type="text" name="districtname" id="districtname" value="<?php echo $r['districtname']; ?>" class="form-control"
                                     aria-describedby="emailHelp">
                                     <input type="hidden" name="districtid" id="districtid" value="<?php echo $r['districtid']; ?>" class="form-control"
                                     aria-describedby="emailHelp">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
<?php
 include_once("footer.php");
if (isset($_POST['submit']))
 {
    $id=$_POST['districtid'];
    $dname=$_POST['districtname'];
    $sql="UPDATE tbl_district set districtname='$dname' where districtid=$id";
    $result=$obj->executequery($sql);
    if ($result == 1)
    {
     echo "<script>alert('Saved Succesfully');window.location='districtview.php' </script>";
    }
    else
    {
     echo "<script>alert('Registration failed');window.location='districtview.php' </script>";
    }
}
?>


 