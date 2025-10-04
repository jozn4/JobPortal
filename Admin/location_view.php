<?php
include("header.php");
?>
<script src="../jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#districtid").change(function() {
            var district_id = $(this).val();
            $.ajax({
                url: "getlocation.php",
                method: "POST",
                data: { districtid: district_id },
                success: function(response) {
                    $("#location").html(response);
                },
                error: function() {
                    $("#location").html("Error occurred while getting location!");
                }
            });
        });
    });
</script>
<style>
    .custom-table-header {
        background-color: #f2f2f2;
        color: #333;
        font-weight: bold;
    }
</style>
</head>
<body>

<?php
include_once("../dboperation.php");
$sql = "SELECT * FROM tbl_district";
$obj = new dboperation();
$result = $obj->executequery($sql);
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="custom-card card shadow">
                <div class="custom-card-body card-body">
                    <h4 class="custom-card-title mb-3">View Location</h4>
                    <p class="custom-card-description mb-4">Select a district to view locations</p>

                    <div class="custom-form-group form-group">
                        <label class="custom-label">Select a District</label>
                        <select class="custom-form-control form-control" name="districtid" id="districtid">
                            <option value="">--------Select District-----------</option>
                            <?php while ($r = mysqli_fetch_array($result)) { ?>
                                <option value="<?php echo $r["districtid"]; ?>">
                                    <?php echo $r["districtname"]; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <table class="custom-table table table-striped text-center align-middle mt-4">
                        <thead class="custom-table-header">
                            <tr>
                                <th style="width: 10%;">Sl.No</th>
                                <th style="width: 60%;">Location Name</th>
                                <th style="width: 30%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="location">
                            <!-- AJAX-loaded rows will appear here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php"); ?>
</body>
</html>
