<?php
include_once ('header.php');
?>
<html>
<head>
    <style>
        body {
            background-color: #f4f4f4;
        }
    </style>
</head>
<div class="main-panel d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                include("../dboperation.php");
                $obj = new dboperation();
                if (isset($_GET["locationid"])) {
                    $locationid = $_GET["locationid"];
                    $sql = "SELECT * FROM tbl_location WHERE locationid='$locationid'";
                    $res = $obj->executequery($sql);
                    $display = mysqli_fetch_array($res);
                }
                ?>
                <div class="card shadow-lg rounded-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Edit location</h4>
                    </div>
                    <div class="card-body">
                        <form action="editlocationaction.php" method="post">
                            <div class="form-group">
                                <label>Location Name</label>
                                <input type="text" class="form-control" name="txtname" 
                                       placeholder="Enter Location Name" 
                                       value="<?php echo $display['locationname']; ?>" required>
                            </div> 
                            <input type="hidden" name="h1" value="<?php echo $display["locationid"]; ?>">
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary px-4">Update</button>
                                <a href="district.php" class="btn btn-secondary px-4">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>
<?php
include_once ('footer.php');
?>