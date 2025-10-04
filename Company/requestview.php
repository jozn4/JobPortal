<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();
$cid = $_SESSION["Login_id"];
$sql = "SELECT r.*, j.name, j.email, c.postname 
        FROM tbl_request r 
        INNER JOIN tbl_jobseeker j ON r.jobseekerid = j.jobseekerid 
        INNER JOIN tbl_companypost c ON r.postid = c.postid
        WHERE r.companyid ='$cid' AND r.status='requested'";
$res = $obj->executequery($sql);
?>

<?php include("header.php"); ?>

<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5">Job Applications</h1>
        
        <table class="table table-bordered text-center align-middle">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Applicant Name</th>
                    <th>Post Name</th>
                    <th>Email</th>
                    <th>Resume</th>
                    <th>Status</th>
                    <th>Applied Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($res) > 0) {
                    $sl = 1;
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr>
                            <td><?php echo $sl++; ?></td>
                            <td><?php echo ($row['name']); ?></td>
                             <td><?php echo ($row['postname']); ?></td>
                            <td><?php echo ($row['email']); ?></td>
                            <td>
                                <?php if (!empty($row['biodata'])) { ?>
                                    <a href="../uploads/<?php echo $row['biodata']; ?>" target="_blank" class="btn btn-info btn-sm">View Resume</a>
                                <?php } else { ?>
                                    <span class="text-muted">No Resume</span>
                                <?php } ?>
                            </td>
                            <td><?php echo ($row['status']); ?></td>
                            <td><?php echo $row['requestdate']; ?></td>
                            <td>
                                <a href='updatestatus.php?rid=<?php echo $row['requestid']; ?>&status=accepted' class='btn btn-success btn-sm'>Accept</a>
                                <a href='updatestatus.php?rid=<?php echo $row['requestid']; ?>&status=rejected' class='btn btn-danger btn-sm'>Reject</a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='8'>No applications found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("footer.php"); ?>
