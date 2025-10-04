<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();
$cid = $_SESSION["Login_id"];
$sql = "SELECT r.*, j.name, j.email 
        FROM tbl_request r 
        JOIN tbl_jobseeker j ON r.jobseekerid = j.jobseekerid 
        WHERE r.companyid ='$cid' and r.status='accepted'";
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
                            <?php 
                           $jid = $row['jobseekerid']; 
                            $pid = $row['postid']; 
                             $sql2 = "SELECT * from tbl_schedule 
                                 WHERE companyid ='$cid' 
                                 AND jobseekerid='$jid' 
                                 AND postid='$pid'";
                                 $res2 = $obj->executequery($sql2); 
                                 $row2 = mysqli_fetch_assoc($res2); 
                                 $remark = "test"; 
                               if($row2) { 
                             $remark = $row2['remark']; 
                                } 
                              ?>
                            <td>
                                <?php if ($remark == "scheduled") { ?>
                                    <span class="text-success fw-bold">
                                        Scheduled on <?php echo date("d M Y", strtotime($row2['scheduledate'])); ?>
                                    </span>
                                <?php } else { ?>
                                   <a href="schedule.php?rid=<?php echo $row['requestid']; ?>" class="btn btn-success btn-sm">Schedule Date</a>
                                <?php } ?>
                        
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='7'>No applications found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("footer.php"); ?>
