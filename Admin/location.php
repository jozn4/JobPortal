 <?php
 include("header.php");
 include_once("../dboperation.php");
 $obj = new dboperation();
 $s="select * from tbl_district";
 $res=$obj->executequery($s);
 ?>
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Location</h6>
                            <form action="locationaction.php" method="post">
                                <label for="exampleInputEmail1" class="form-label">District</label>
                                
                               <select name="districtid" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                <option selected>-select-</option>
                                <?php
                                while($r=mysqli_fetch_array($res))
                                    {
                                     ?>
                                <option value="<?php echo $r['districtid'];?>"><?php echo $r['districtname'];?></option>
                                <?php }?>
                            </select>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Location</label>
                                    <input type="text" name="location" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    
                                </div>
                               
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                      <?php
 include_once("footer.php");
 ?>
