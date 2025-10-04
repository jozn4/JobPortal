<?php
 include("header.php");
include_once("../dboperation.php");
$obj = new dboperation();
$job="SELECT * FROM tbl_jobtype limit 4";
$jres = $obj->executequery($job);
?>
<!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Category</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Category</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->
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
                    <p class="mb-0">123 Vacancy</p>
                </a>
            </div>
        <?php } ?>
        </div>
    </div>
</div>
<!-- Category End -->

        


<?php include("footer.php"); ?>