 <?php
 include("header.php");
 ?>
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Plan Registration</h6>
                            <form action="planaction.php" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Plan Name</label>
                                    <input type="text" name="pname" id="pname" class="form-control"
                                     aria-describedby="emailHelp">
                                     <br>
                                     <label for="exampleInputEmail1" class="form-label">Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control"
                                     aria-describedby="emailHelp">
                                     <br>
                                     <label for="exampleInputEmail1" class="form-label">Duration</label>
                                    <input type="date" name="duration" id="duration" class="form-control"
                                     aria-describedby="emailHelp">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                      <?php
 include_once("footer.php");
 ?>
