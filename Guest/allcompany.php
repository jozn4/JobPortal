<?php
 include("header.php");
include_once("../dboperation.php");
$sql = "SELECT * FROM tbl_company where status='accepted' ";
$obj = new dboperation();
$res = $obj->executequery($sql);
?>
<!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Companys</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Companys</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        
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
<?php include("footer.php"); ?>