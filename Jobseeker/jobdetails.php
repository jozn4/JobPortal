<?php
include("header.php");
include_once("../dboperation.php");

$obj = new dboperation();

if (isset($_GET['postid'])) {
    $postid =$_GET['postid'];
    $sql = "SELECT * FROM tbl_companypost c 
        INNER JOIN tbl_jobtype j ON j.jobtypeid = c.jobtypeid 
        INNER JOIN tbl_company cy ON cy.companyid = c.companyid 
        INNER JOIN tbl_location l ON l.locationid = cy.locationid 
        INNER JOIN tbl_district d ON d.districtid = l.districtid 
        WHERE postid = $postid";
    $res = $obj->executequery($sql);
    $row = mysqli_fetch_assoc($res);
        $postname = $row['postname'];
        $criteria = $row['criteria'];
        $jobtime  = $row['jobtime'];
        $postdate = $row['postdate'];
        $enddate = $row['enddate'];
        $location = $row['locationname'];
        $dis = $row['districtname'];
        $job = $row['jobtypename'];    
        $des= $row['description'];
        $cname = $row['name'];
        $contact = $row['contactnum'];
        $jobdes = $row['jobdescription'];
}
 else {
    echo "<p>No job selected.</p>";
    include("footer.php");
    exit;
}
?>



        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->

<!-- Job Detail Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gy-5 gx-4">
            
            <!-- Left Column: Job Description -->
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-5">
<img class="img-fluid border" src="../uploads/<?php echo($row['photo']); ?>" alt="Company Logo" style="width: 80px; height: 80px; object-fit: contain; border-radius: 10px;">
                    <div class="text-start ps-4">
                         <h5 class="mb-1"><?php echo $postname; ?></h5>
                                        <p class="mb-3 text-muted"><?php echo $cname; ?></p>
                        <span class="text-truncate me-3">
                            <i class="fa fa-map-marker-alt text-primary me-2"></i>
                            <?php echo $location . ", " . $dis; ?>
                            <i class="fa fa-briefcase text-primary me-2 ms-3"></i>
                            <?php echo $job; ?>
                        </span>
                    </div>
                </div>

                <div class="mb-5">
                    <h4 class="mb-3">Job description</h4>
                            <p><?php echo $jobdes; ?></p>
                            
                    <h4 class="mb-3">Qualifications</h4>
                    <p><?php echo $criteria; ?></p>
                </div>
            </div>

           <!-- Right Column: Job & Company Details -->
<div class="col-lg-4">
    <!-- Job Summary -->
    <div class="bg-light rounded p-5 mb-4">
        <h4 class="mb-4">Job Summary</h4>
        <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: <?php echo $postdate; ?></p>
        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: <?php echo $jobtime; ?></p>
        <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Deadline: <?php echo $enddate; ?></p>
    </div>

    <!-- Company Detail -->
    <div class="bg-light rounded p-5">
        <h4 class="mb-4">Company Detail</h4>
        <p><i class="fa fa-angle-right text-primary me-2"></i>Name: <?php echo $cname; ?></p>
        <p><?php echo $des; ?></p>
        <p><i class="fa fa-angle-right text-primary me-2"></i>Contact.No: <?php echo $contact; ?></p>
    </div>
</div>

<div class="col-lg-12 mt-4">
    <div class="d-flex justify-content-center justify-content-md-start gap-3 flex-wrap">
        <a href="apply.php?postid=<?php echo $postid;?>" class="btn btn-outline-primary btn-lg px-4 py-2">
            <i class="fa fa-edit me-2"></i> Apply Now
        </a>
    </div>
</div>

    </div>
</div>
<!-- Job Detail End -->

<?php include("footer.php"); ?>
