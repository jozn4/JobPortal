
<?php
 include("header.php");
include_once("../dboperation.php");
$sql = "SELECT * FROM tbl_company where status='accepted' limit 4";
$obj = new dboperation();
$res = $obj->executequery($sql);
$job="SELECT * FROM tbl_jobtype limit 4";
$jres = $obj->executequery($job);
$s1 = "SELECT * FROM tbl_companypost c 
        INNER JOIN tbl_jobtype j ON j.jobtypeid = c.jobtypeid 
        INNER JOIN tbl_company cy ON cy.companyid = c.companyid 
        INNER JOIN tbl_location l ON l.locationid = cy.locationid 
        INNER JOIN tbl_district d ON d.districtid = l.districtid 
        WHERE jobtime = 'fulltime' LIMIT 4";

$s2 = "SELECT * FROM tbl_companypost c 
        INNER JOIN tbl_jobtype j ON j.jobtypeid = c.jobtypeid 
        INNER JOIN tbl_company cy ON cy.companyid = c.companyid 
        INNER JOIN tbl_location l ON l.locationid = cy.locationid 
        INNER JOIN tbl_district d ON d.districtid = l.districtid 
        WHERE jobtime = 'parttime' LIMIT 4";

$res1 = $obj->executequery($s1);
$res2 = $obj->executequery($s2);
?>
 

        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Job That You Deserved</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                    <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                                    <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job That Fit You</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                    <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                                    <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input type="text" class="form-control border-0" placeholder="Keyword" />
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0">
                                    <option selected>Category</option>
                                    <option value="1">Category 1</option>
                                    <option value="2">Category 2</option>
                                    <option value="3">Category 3</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0">
                                    <option selected>Location</option>
                                    <option value="1">Location 1</option>
                                    <option value="2">Location 2</option>
                                    <option value="3">Location 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search End -->
<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
        <div class="row g-4">
<?php while ($r4 = mysqli_fetch_array($jres)) { ?>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="joblistc.php?cid=<?php echo $r4['jobtypeid'];?>">
                    <i class="fa fa-3x fa-briefcase text-primary mb-4"></i>
                    <h6 class="mb-3"><?php echo $r4['jobtypename']; ?></h6>
                    <?php
                    $dum=$r4['jobtypename'];
                    $vac="SELECT COUNT(*) AS trows FROM tbl_companypost c INNER JOIN tbl_jobtype j ON c.jobtypeid = j.jobtypeid where j.jobtypename='$dum'";
                    $tres = $obj->executequery($vac);
                    $row = mysqli_fetch_assoc($tres);
                    $vacancy = $row['trows'];
                    ?>
                    <p class="mb-0"> <?php echo $vacancy; ?> Vacancy</p>
                    
                </a>
            </div>
        <?php } ?>
        </div>
        <div class="text-center mt-4 wow fadeInUp" data-wow-delay="0.1s">
      <a class="btn btn-primary py-3 px-5" href="allcategory.php">Browse More Company</a>
    </div>
    </div>
</div>
<!-- Category End -->


<!-- Explore By Company Start -->
<div class="container-xxl py-5">
  <div class="container">
    <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
      Explore By Company
    </h1>
    <div class="row g-4">
      <?php while ($r = mysqli_fetch_array($res)) { ?>
        <!-- Company Card -->
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="company-card p-4 h-100 text-center">
            <div class="logo-bg mb-3">
              <img src="../uploads/<?php echo($r['photo']); ?>" alt="not found" class="company-logo">
            </div>
            <h5 class="mb-1 fw-semibold"><?php echo $r['name']; ?></h5>
            <p class="text-muted small mb-3">
              <?php echo $r['description']; ?>
            </p>
            <a href="joblist.php?cid=<?php echo $r['companyid'];?>" class="btn btn-primary btn-sm px-4 rounded-pill">View Jobs</a>
          </div>
        </div>
      <?php } ?>
    </div>

    <div class="text-center mt-4 wow fadeInUp" data-wow-delay="0.1s">
      <a class="btn btn-primary py-3 px-5" href="allcompany.php">Browse More Company</a>
    </div>
  </div>
</div>
<!-- Explore By Company End -->


<!-- CSS -->
<style>
.company-card {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  transition: all 0.3s ease;
}
.company-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 8px 24px rgba(0,0,0,0.12);
}

.logo-bg {
  width: 100%;
  height: 120px;
  background: linear-gradient(135deg, #e3f2fd, #bbdefb);
  border-radius: 12px;
  overflow: hidden;
}

.company-logo {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Fill the entire rectangle */
}

.rating {
  font-size: 14px;
  color: #f39c12;
}

.btn-primary {
  background-color: #39a560ff;
  border: none;
}
.btn-primary:hover {
  background-color: #2ca95aff;
}
</style>

        <!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="row g-0 about-bg rounded overflow-hidden">
                    <div class="col-6 text-start">
                        <img class="img-fluid w-100" src="img/about-1.jpg" alt="Career success">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;" alt="Teamwork">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid" src="img/about-3.jpg" style="width: 85%;" alt="Job search">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid w-100" src="img/about-4.jpg" alt="Workplace">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">We Help You Find the Right Job and the Right Talent</h1>
                <p class="mb-4">
                    Our platform connects job seekers with trusted employers across various industries. 
                    Whether you are a professional looking to advance your career or a company searching for skilled candidates, we make the hiring process smooth, fast, and effective.
                </p>
                <p><i class="fa fa-check text-primary me-3"></i>Wide range of job categories and opportunities</p>
                <p><i class="fa fa-check text-primary me-3"></i>Simple and quick application process</p>
                <p><i class="fa fa-check text-primary me-3"></i>Trusted by employers and job seekers alike</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="about.php">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->



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
                                    <img class="img-fluid border rounded-circle" src="../uploads/<?php echo($r['photo']); ?>" alt="Full-time" style="width: 80px; height: 80px;">
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
<a class="btn btn-primary" href="apply.php?postid=<?php echo $r['postid'];?>">Apply Now</a>
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
                                    <img class="img-fluid border rounded-circle" src="../uploads/<?php echo($r2['photo']); ?>" alt="Part-time" style="width: 80px; height: 80px;">
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
                              <a class="btn btn-primary" href="apply.php?postid=<?php echo $r2['postid'];?>">Apply Now</a>
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
             <a class="btn btn-primary py-3 px-5" href="alljobs.php">Browse More Jobs</a>
            </div>
        </div>
        
    </div>
    
</div>
<!-- Jobs End -->
 
<?php
 include("footer.php");
 ?>