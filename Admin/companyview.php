<?php
include("header.php");
include_once("../dboperation.php");
$obj = new dboperation();
$s = "SELECT * FROM tbl_company";
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

    .table td img {
        display: block;
        margin: auto;
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .btn-action {
        margin: 2px;
        min-width: 75px;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .truncate {
        max-width: 120px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
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
<h4 class="mb-4 text-dark fw-semibold">Company Requests</h4>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle table-bordered">
                            <thead class="custom-table-header">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>License #</th>
                                    <th>Location</th>
                                    <th>Reg Date</th>
                                    <th>Contact</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Status</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($r = mysqli_fetch_array($res)) { 
                                    $status = $r['status'];
                                    $badgeClass = 'secondary';
                                    if ($status === 'accepted') {
                                        $badgeClass = 'success';
                                    } elseif ($status === 'rejected') {
                                        $badgeClass = 'danger';
                                    }
                                ?>
                                    <tr>
                                        <td><?php echo ($r['companyid']); ?></td>
                                        <td class="truncate" title="<?php echo ($r['name']); ?>"><?php echo ($r['name']); ?></td>
                                        <td><img src="../uploads/<?php echo ($r['photo']); ?>" /></td>
                                        <td><?php echo ($r['licensenumber']); ?></td>
                                        <td><?php echo ($r['locationid']); ?></td>
                                        <td><?php echo ($r['regdate']); ?></td>
                                        <td><?php echo ($r['contactnum']); ?></td>
                                        <td><?php echo ($r['username']); ?></td>
                                        <td><?php echo ($r['password']); ?></td>
                                        <td>
                                            <span class="badge bg-<?php echo $badgeClass; ?>">
                                                <?php echo ($status); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="companyaccept.php?eid=<?php echo $r['companyid']; ?>&action=accept" class="btn btn-sm btn-success btn-action">Accept</a>
                                            <a href="companyreject.php?eid=<?php echo $r['companyid']; ?>&action=reject" class="btn btn-sm btn-danger btn-action" onclick="return confirm('Are you sure you want to reject this company?');">Reject</a>
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
