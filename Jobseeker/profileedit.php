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

// Fetch all districts for dropdown
$sql2 = "SELECT * FROM tbl_district";
$result2 = $obj->executequery($sql2);

if (isset($_POST['update_jobseeker'])) {
    $name         = $_POST['name'];
    $email        = $_POST['email'];
    $contact      = $_POST['contact'];
    $qualification= $_POST['qualification'];
    $dob          = $_POST['dob'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $locationid   = $_POST['location'];

    // Photo upload
    if (!empty($_FILES["photo"]["name"])) {
        $img = time() . "_" . $_FILES["photo"]["name"];
        move_uploaded_file($_FILES["photo"]["tmp_name"], "../uploads/" . $img);
    } else {
        $img = $row['photo']; // keep old
    }

    // Update query
    $update_sql = "UPDATE tbl_jobseeker SET 
                    name='$name',
                    email='$email',
                    contactnum='$contact',
                    qualification='$qualification',
                    dob='$dob',
                    username='$username',
                    password='$password',
                    locationid='$locationid',
                    photo='$img'
                   WHERE jobseekerid='$jobseekerid'";

    $obj->executequery($update_sql);
    echo "<script>alert('Profile updated successfully!');window.location='profileview.php'</script>";
}
?>

<style>
.edit-section {
    background: linear-gradient(135deg, #f0f7ff, #ffffff);
    padding: 60px 0;
}
.edit-card {
    background-color: #ffffff;
    border-radius: 1.5rem;
    box-shadow: 0 1rem 2rem rgba(0,0,0,0.15);
    padding: 3rem;
    max-width: 900px;
    margin: auto;
}
.form-label { font-weight: 600; }
.form-control, .form-select {
    border-radius: 0.5rem;
    padding: 0.6rem 1rem;
}
.logo-preview {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
    border: 4px solid #1fb032ff;
}
.logo-form-wrapper {
    display: flex;
    align-items: flex-start;
    gap: 2rem;
    flex-wrap: wrap;
}
.logo-column { flex: 0 0 170px; text-align: center; }
.form-column { flex: 1; }
.btn-update {
    border-radius: 0.75rem;
    font-size: 1.1rem;
    padding: 0.7rem 2rem;
    transition: all 0.3s ease;
}
.btn-update:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1rem rgba(13,110,253,0.3);
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
                $("#location").html("<option>Error loading locations</option>");
            }
        });
    });
});
</script>

<div class="edit-section">
    <div class="container">
        <div class="edit-card">
            <h3 class="text-primary mb-4 text-center">Edit Jobseeker Profile</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="logo-form-wrapper">
                    <!-- Photo Column -->
                    <div class="logo-column">
                        <?php if(!empty($row['photo'])) { ?>
                            <img src="../uploads/<?php echo $row['photo']; ?>" alt="Profile" class="logo-preview mb-3">
                        <?php } ?>
                        <input type="file" name="photo" class="form-control">
                    </div>

                    <!-- Form Column -->
                    <div class="form-column">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact Number</label>
                                <input type="text" name="contact" class="form-control" value="<?php echo $row['contactnum']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Qualification</label>
                                <input type="text" name="qualification" class="form-control" value="<?php echo $row['qualification']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="dob" class="form-control" value="<?php echo $row['dob']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Password</label>
                                <input type="text" name="password" class="form-control" value="<?php echo $row['password']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">District</label>
                                <select class="form-select" name="districtid" id="districtid">
                                    <option value="<?php echo $row['districtid']; ?>"><?php echo $row['districtname']; ?></option>
                                    <?php while ($r = mysqli_fetch_array($result2)) { ?>
                                        <option value="<?php echo $r["districtid"]; ?>"><?php echo $r["districtname"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Location</label>
                                <select class="form-select" name="location" id="location">
                                    <option value="<?php echo $row['locationid']; ?>"><?php echo $row['locationname']; ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-5 text-center">
                    <button type="submit" name="update_jobseeker" class="btn btn-primary btn-update">
                        <i class="fa fa-save me-2"></i> Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
