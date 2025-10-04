<?php
 include("header.php"); 

include_once("../dboperation.php");
$sql = "SELECT * FROM tbl_jobtype";
$obj = new dboperation();
$result = $obj->executequery($sql);
    $jobid = $_GET["id"];
$sql2 = "SELECT * FROM tbl_companypost c inner join tbl_jobtype j on c.jobtypeid=j.jobtypeid where postid='$jobid'";
$obj2 = new dboperation();
$result2 = $obj->executequery($sql2);
$r2=mysqli_fetch_array($result2);
?>
<style>
    .select {
        display: block;
    }
</style>

<script src="../jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#districtid").change(function () {
            var district_id = $(this).val();
            $.ajax({
                url: "getlocation.php",
                method: "POST",
                data: { districtid: district_id },
                success: function (response) {
                    $("#location").html(response);
                },
                error: function () {
                    $("#location").html("Error occurred while getting location!");
                }
            });
        });
    });
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="wow fadeInUp" data-wow-delay="0.5s">
                <form action="editaction.php" method="post" enctype="multipart/form-data" class="p-4 border rounded bg-light">
                    <h2 class="text-center mb-4">Post Registration</h2>

                     <div class="mb-3">
                        <label for="districtid" class="form-label">Select a Job Category</label>
                        <select class="form-control" name="jobtypeid" id="jobtypeid">
                            <option value="<?php echo $r2["jobtypeid"]; ?>"><?php echo $r2["jobtypename"]; ?></option>
                            <?php while ($r = mysqli_fetch_array($result)) { ?>
                                <option value="<?php echo $r["jobtypeid"]; ?>"><?php echo $r["jobtypename"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pname" class="form-label">  Post Name</label>
                        <input type="text" class="form-control" id="pname" name="pname" value="<?php echo $r2["postname"]; ?>" placeholder="Enter Your Post Name">
<input type="hidden" name="postid" value="<?php echo $r2["postid"]; ?>">

                    </div>

                    <div class="mb-3">
                        <label for="criteria" class="form-label">Criteria</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="criteria" id="criteria" style="height: 150px"><?php echo $r2["criteria"]; ?></textarea>
                            <label for="criteria">Enter the Criteria</label>
                        </div>
                    </div>
                     <div class="mb-3">
                        <label for="jobtype" class="form-label">Select a Job Type</label>
                        <select class="form-control" name="jobtype" id="jobtype">
                            <option value="<?php echo $r2["jobtime"]; ?>"><?php echo $r2["jobtime"]; ?></option>
                                <option value="parttime">Part-time</option>
                                 <option value="fulltime">Full-time</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="enddate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="enddate" name="enddate" value="<?php echo $r2["enddate"]; ?>" placeholder="End Date">
                    </div>
                    
                   

                    <div class="d-grid">
                        <button class="btn btn-primary py-2" type="submit" name="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
