<?php
include("header.php");
 $postid =$_GET['postid'];
?>
<!-- Header End -->
<div class="container-xxl py-5 bg-primary page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Apply for Job</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="joblist.php">Job List</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Apply</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->


<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5">Apply for Job</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="applyaction.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <input type="hidden" name="pid" id="pid" value="<?php echo $postid; ?>">

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="resume" class="form-label">Upload Resume (PDF, DOCX)</label>
                        <input type="file" class="form-control" name="resume" id="resume" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">Submit Resume</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
