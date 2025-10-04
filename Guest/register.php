<?php include("header.php"); ?>
<?php
include_once("../dboperation.php");
$sql = "SELECT * FROM tbl_district";
$obj = new dboperation();
$result = $obj->executequery($sql);
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
                <form action="registeraction.php" method="post" enctype="multipart/form-data" class="p-4 border rounded bg-light">
                    <h2 class="text-center mb-4">Company Registration</h2>

                    <div class="mb-3">
                        <label for="uname" class="form-label">  Company Name</label>
                        <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Your Company Name">
                    </div>
                     <div class="mb-3">
                        <label for="ln" class="form-label">Licence Number</label>
                        <input type="text" class="form-control" id="ln" name="ln" placeholder="Licence Number">
                    </div>

                    <div class="mb-3">
                     <label for="description" class="form-label">  Description</label>
                        <div class="form-floating">
                             <textarea class="form-control" name="description" placeholder="" id="message" style="height: 150px"></textarea>
                             <label for="message">Enter Your Company Description</label>
                         </div>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Image</label>
                        <input class="form-control" name="photo" id="photo" type="file">
                    </div>

                

                    <div class="mb-3">
                        <label for="districtid" class="form-label">Select a District</label>
                        <select class="form-control" name="districtid" id="districtid">
                            <option value="">--------Select District-----------</option>
                            <?php while ($r = mysqli_fetch_array($result)) { ?>
                                <option value="<?php echo $r["districtid"]; ?>"><?php echo $r["districtname"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Select a Location</label>
                        <select class="form-control" name="location" id="location">
                            <option>---Choose Location---</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="cn" class="form-label">Contact No</label>
                        <input type="text" class="form-control" id="cn" name="cn" placeholder="Contact No">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary py-2" type="submit" name="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
