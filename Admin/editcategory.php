<?php
 include("header.php");
 include_once("../dboperation.php");
 $obj = new dboperation();
 if(isset($_GET['eid']))
 {
    $cid=$_GET['eid'];
    $sql="select * from tbl_jobtype where jobtypeid='$cid'";
    $res=$obj->executequery($sql);
    $r=mysqli_fetch_array($res);
 }

 ?>
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Category Updation</h6>
                            <form action="editaction.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="text" name="jobtypename" id="jobtypename" value="<?php echo $r['jobtypename']; ?>" class="form-control"
                                     aria-describedby="emailHelp">
                                     <input type="hidden" name="jobtypeid" id="jobtypeid" value="<?php echo $r['jobtypeid']; ?>" class="form-control"
                                     aria-describedby="emailHelp">
                                     <br>
                                    <br>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                      <?php
 include_once("footer.php");
 ?>


