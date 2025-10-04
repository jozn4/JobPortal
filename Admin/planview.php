<?php
include("header.php");
include_once("../dboperation.php");
$obj = new dboperation();

$s = "SELECT * FROM tbl_plan";
$res = $obj->executequery($s);
?>

<style>
    .custom-table-header th {
        background-color: #0d6efd;
        color: white;
        text-align: center;
    }

    .table td, .table th {
        vertical-align: middle !important;
        text-align: center;
        white-space: nowrap;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="mb-4 text-dark fw-semibold">Available Plans</h4>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle table-bordered">
                            <thead class="custom-table-header">
                                <tr>
                                    <th>Plan ID</th>
                                    <th>Plan Name</th>
                                    <th>Amount</th>
                                    <th>Duration</th>
                                                                        <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($r = mysqli_fetch_array($res)) { ?>
                                    <tr>
                                        <td><?php echo $r['plan_id']; ?></td>
                                        <td><?php echo $r['plan_name']; ?></td>
                                        <td>₹<?php echo $r['amount']; ?></td>
                                        <td><?php echo $r['duration']; ?></td>
                                         <td>
                                        <a href="editplan.php?pid=<?php echo $r['plan_id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    
                                    
                                        <a href="deleteplan.php?pid=<?php echo $r['plan_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this district?');">Delete</a>
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
</div>

<?php include_once("footer.php"); ?>
