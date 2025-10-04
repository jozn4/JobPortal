<?php
include("header.php");
include_once("../dboperation.php");
$obj = new dboperation();
$jid = $_SESSION["Login_id"];
$sql = "SELECT r.requestid, r.requestdate, r.status, c.postname, comp.name AS companyname, s.scheduledate, s.remark 
        FROM tbl_request r
        INNER JOIN tbl_companypost c ON r.postid = c.postid
        INNER JOIN tbl_company comp ON r.companyid = comp.companyid
        LEFT JOIN tbl_schedule s ON r.jobseekerid = s.jobseekerid AND r.postid = s.postid AND r.companyid = s.companyid
        WHERE r.jobseekerid = '$jid' AND r.status='accepted'
        ORDER BY r.requestdate DESC";
$res = $obj->executequery($sql);
?>

<style>
/* Full-width background for section */
.job-section {
    background: linear-gradient(120deg, #e0f7fa, #f1f8e9);
    padding: 60px 30px;
}

/* Card styling */
.job-card {
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 25px;
    background: linear-gradient(145deg, #ffffff, #f0f8ff);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    width: 100%;
}
.job-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

/* Text styling */
.company-name {
    font-weight: 600;
    font-size: 1.25rem;
}
.post-name {
    font-weight: 500;
    color: #333;
    margin-bottom: 12px;
}
.applied-date {
    font-size: 0.9rem;
    color: #555;
    margin-bottom: 12px;
}
.status-badge {
    font-size: 0.85rem;
    padding: 5px 12px;
    border-radius: 50px;
}
.interview-badge {
    display: inline-block;
    background-color: #28a745;
    color: #fff;
    padding: 8px 14px;
    border-radius: 15px;
    font-weight: 500;
    font-size: 0.9rem;
}
.interview-badge.pending {
    background-color: #6c757d;
}

/* Optional: make text responsive */
@media (max-width: 768px) {
    .job-card {
        padding: 20px;
    }
    .company-name {
        font-size: 1.1rem;
    }
}
</style>

<div class="job-section">
    <div class="container-fluid">
        <div class="text-center mb-5">
            <h1>My Accepted Jobs</h1>
        </div>

        <div class="row justify-content-center">
            <?php
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $isScheduled = ($row['remark'] == "scheduled");
                    ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="job-card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="company-name"><?php echo $row['companyname']; ?></span>
                                <span class="badge bg-primary status-badge"><?php echo ucfirst($row['status']); ?></span>
                            </div>
                            <div class="post-name"><?php echo $row['postname']; ?></div>
                            <div class="applied-date">
                                <strong>Applied:</strong> <?php echo date("d M Y", strtotime($row['requestdate'])); ?>
                            </div>
                            <div class="interview-info">
                                <?php if ($isScheduled) { ?>
                                    <span class="interview-badge">
                                        Scheduled on <?php echo date("D, d M Y", strtotime($row['scheduledate'])); ?>
                                    </span>
                                <?php } else { ?>
                                    <span class="interview-badge pending">Pending Interview</span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<div class="col-12 text-center"><p class="text-muted">No accepted jobs found</p></div>';
            }
            ?>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
