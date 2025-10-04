 <?php
 include("header.php");
  include_once("../dboperation.php");
 $obj = new dboperation();
  if(isset($_GET['pid']))
 {
    $pid=$_GET['pid'];
    $sql="select * from tbl_plan where plan_id='$pid'";
    $res=$obj->executequery($sql);
    $r=mysqli_fetch_array($res);
 }
 ?>
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Edit Plan</h6>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Plan Name</label>
                                    <input type="text" name="pname"  id="pname" value="<?php echo $r['plan_name']; ?>" class="form-control"
                                     aria-describedby="emailHelp">
                                     <br>
                                     <label for="exampleInputEmail1" class="form-label">Amount</label>
                                    <input type="text" name="amount" id="amount" value="<?php echo $r['amount']; ?>" class="form-control"
                                     aria-describedby="emailHelp">
                                     <br>
                                     <label for="exampleInputEmail1" class="form-label">Duration</label>
                                    <input type="date" name="duration" id="duration" value="<?php echo $r['duration']; ?>" class="form-control"
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
    $name=$_POST['pname'];
    $amount=$_POST['amount'];
        $d=$_POST['duration'];
    $sql1="UPDATE tbl_plan set plan_name='$name',amount='$amount', duration='$d' where plan_id='$pid'";
    $result=$obj->executequery($sql1);
    if ($result == 1)
    {
     echo "<script>alert('Saved Succesfully');window.location='planview.php' </script>";
    }
    else
    {
     echo "<script>alert('update failed');window.location='planview.php' </script>";
    }
}
?>
 ?>
