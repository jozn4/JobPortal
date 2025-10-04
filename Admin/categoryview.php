<?php
include("header.php");
include_once("../dboperation.php");

$obj = new dboperation();
$s = "SELECT * FROM tbl_jobtype";
$res = $obj->executequery($s);
?>

<style>
    .custom-table-header {
        background-color: #f2f2f2;
        color: #333;
        font-weight: bold;
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="mb-3">Job Types</h4>

                    <table class="table table-striped text-center align-middle">
                        <thead class="custom-table-header">
                            <tr>
                                <th style="width: 20%;">Job ID</th>
                                <th style="width: 50%;">Job Name</th>
                                <th colspan="2" style="width: 30%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($r = mysqli_fetch_array($res)) { ?>
                                <tr>
                                    <td><?php echo $r['jobtypeid']; ?></td>
                                    <td><?php echo $r['jobtypename']; ?></td>
                                    <td>
                                        <a href="editcategory.php?eid=<?php echo $r['jobtypeid']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    
                                    
                                        <a href="deletecategory.php?eid=<?php echo $r['jobtypeid']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this job type?');">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php"); ?>
