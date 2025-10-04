<?php
include("header.php");
include_once("../dboperation.php");
$obj = new dboperation();
$s1 = "SELECT * FROM tbl_companypost c 
        INNER JOIN tbl_jobtype j ON j.jobtypeid = c.jobtypeid 
        INNER JOIN tbl_company cy ON cy.companyid = c.companyid 
        INNER JOIN tbl_location l ON l.locationid = cy.locationid 
        INNER JOIN tbl_district d ON d.districtid = l.districtid 
        WHERE jobtime = 'fulltime'";

$s2 = "SELECT * FROM tbl_companypost c 
        INNER JOIN tbl_jobtype j ON j.jobtypeid = c.jobtypeid 
        INNER JOIN tbl_company cy ON cy.companyid = c.companyid 
        INNER JOIN tbl_location l ON l.locationid = cy.locationid 
        INNER JOIN tbl_district d ON d.districtid = l.districtid 
        WHERE jobtime = 'parttime'";

$res1 = $obj->executequery($s1);
$res2 = $obj->executequery($s2);
?>
 <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->

<!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                        <h6 class="mt-n1 mb-0">Full Time</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                        <h6 class="mt-n1 mb-0">Part Time</h6>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <!-- Full Time Jobs -->
                <div id="tab-1" class="tab-pane fade show active p-0">
                    <?php while ($r = mysqli_fetch_array($res1)) { ?>
                        <div class="job-item p-4 mb-4 border rounded">
                            <div class="row g-4">
                                <div class="col-md-8 d-flex align-items-center">
                                    <img class="img-fluid border rounded-circle" src="img/fulltime.jpg" alt="Full-time" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                         <h5 class="mb-1"><?php echo $r['postname']; ?></h5>
                                        <p class="mb-3 text-muted"><?php echo $r['name']; ?></p>
                                        <span class="me-3">
                                            <i class="fa fa-map-marker-alt text-primary me-2"></i>
                                            <?php echo $r['locationname'] . ", " . $r['districtname']; ?>
                                        </span>
                                        <span class="me-3">
                                            <i class="fa fa-briefcase text-primary me-2"></i>
                                            <?php echo $r['jobtypename']; ?>
                                        </span>
                                    </div>
                                </div>
                                 <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                       <div class="d-flex mb-3 gap-2">
    <a class="btn btn-primary" href="userregister.php">Apply Now</a>
    <a class="btn btn-outline-primary" href="jobdetails.php?postid=<?php echo $r['postid'];?>">View Details</a>
</div>

                                    <small>
                                        <i class="far fa-calendar-alt text-primary me-2"></i>
                                        Date Line: <?php echo $r['enddate']; ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <!-- Part Time Jobs -->
                <div id="tab-2" class="tab-pane fade p-0">
                    <?php while ($r2 = mysqli_fetch_array($res2)) { ?>
                        <div class="job-item p-4 mb-4 border rounded">
                            <div class="row g-4">
                                <div class="col-md-8 d-flex align-items-center">
                                    <img class="img-fluid border rounded-circle" src="img/parttime.png" alt="Part-time" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-1"><?php echo $r2['postname']; ?></h5>
                                        <p class="mb-3 text-muted"><?php echo $r2['name']; ?></p>
                                        <span class="me-3">
                                            <i class="fa fa-map-marker-alt text-primary me-2"></i>
                                            <?php echo $r2['locationname'] . ", " . $r2['districtname']; ?>
                                        </span>
                                        <span class="me-3">
                                            <i class="fa fa-briefcase text-primary me-2"></i>
                                            <?php echo $r2['jobtypename']; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3 gap-2">
                              <a class="btn btn-primary" href="userregister.php">Apply Now</a>
                              <a class="btn btn-outline-primary" href="jobdetails.php?postid=<?php echo $r2['postid'];?>">View Details</a>
                                        </div>
                                    <small>
                                        <i class="far fa-calendar-alt text-primary me-2"></i>
                                        Date Line: <?php echo $r2['enddate']; ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Jobs End -->

<?php include("footer.php"); ?>
