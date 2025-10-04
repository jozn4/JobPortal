<?php
 include("header.php");
 ?>
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Job categories</h6>
                            <form action="categoryaction.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="jobtypename" id="jobtypename" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
<?php  
 include_once("footer.php");
 ?>