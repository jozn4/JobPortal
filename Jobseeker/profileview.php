<?php
include("header.php");
include_once("../dboperation.php");

$obj = new dboperation();
$jobseekerid = $_SESSION["Login_id"];

// Fetch jobseeker with location & district
$sql = "SELECT * FROM tbl_jobseeker j
        INNER JOIN tbl_location l ON l.locationid = j.locationid
        INNER JOIN tbl_district d ON d.districtid = l.districtid
        WHERE j.jobseekerid = '$jobseekerid'";
$res = $obj->executequery($sql);
$row = mysqli_fetch_assoc($res);

if (!$row) {
    echo "<p class='text-center mt-5'>Jobseeker not found.</p>";
    include("footer.php");
    exit;
}

// Assign variables
$name       = $row['name'];
$email      = $row['email'];
$contact    = $row['contactnum'];
$qualification = $row['qualification'];
$photo      = $row['photo'];
$username   = $row['username'];
$regdate    = $row['regdate'];
$dob        = $row['dob'];
$renewaldate= $row['renewaldate'];
$status     = $row['status'];
$district   = $row['districtname'];
$location   = $row['locationname'];
?>

<!-- Jobseeker Profile Start -->
<div class="container-xxl py-5" style="background: #f3f6ff;">
    <div class="container">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-body p-5">
                <div class="row gy-5 gx-4 align-items-center">

                    <!-- Left Column: Profile Photo -->
                    <div class="col-lg-4 text-center border-end">
                        <img src="../uploads/<?php echo $photo; ?>" 
                             class="img-fluid mb-3"
                             style="width: 180px; height: 180px; border-radius: 50%; object-fit: cover; border: 5px solid #1fb638ff;"
                             alt="Profile Photo">
                        <h3 class="mb-2"><?php echo $name; ?></h3>
                        <span class="badge bg-primary px-3 py-2"><?php echo $status; ?></span>
                    </div>

                    <!-- Right Column: Personal Details -->
                    <div class="col-lg-8">
                        <h4 class="mb-4 text-primary">Personal Information</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <p><i class="fa fa-envelope text-primary me-2"></i><strong>Email:</strong> <?php echo $email; ?></p>
                                <p><i class="fa fa-phone text-primary me-2"></i><strong>Contact:</strong> <?php echo $contact; ?></p>
                                <p><i class="fa fa-id-card text-primary me-2"></i><strong>Username:</strong> <?php echo $username; ?></p>
                                <p><i class="fa fa-graduation-cap text-primary me-2"></i><strong>Qualification:</strong> <?php echo $qualification; ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><i class="fa fa-calendar-plus text-primary me-2"></i><strong>Registered:</strong> <?php echo date("d M Y", strtotime($regdate)); ?></p>
                                <p><i class="fa fa-calendar text-primary me-2"></i><strong>Date of Birth:</strong> <?php echo date("d M Y", strtotime($dob)); ?></p>
                                <p><i class="fa fa-calendar-check text-primary me-2"></i><strong>Renewal:</strong> <?php echo date("d M Y", strtotime($renewaldate)); ?></p>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i><strong>District:</strong> <?php echo $district; ?></p>
                                <p><i class="fa fa-map-pin text-primary me-2"></i><strong>Location:</strong> <?php echo $location; ?></p>
                            </div>
                        </div>

                        <!-- Edit Button -->
                        <div class="mt-5 text-end">
                            <a href="profileedit.php?jobseekerid=<?php echo $jobseekerid; ?>" 
                               class="btn btn-primary btn-lg px-4 py-2">
                                <i class="fa fa-edit me-2"></i> Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
