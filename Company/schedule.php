<?php 
include("header.php"); 
 $rid =$_GET['rid'];

?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-4">
                <h3 class="text-center mb-4">Schedule Interview</h3>
                <form action="scheduleaction.php" method="POST">
                    <div class="mb-3">
                        <label for="schedule_date" class="form-label">Select Date</label>
                        <input type="date" name="schedule_date" id="schedule_date" class="form-control" required>
                        <input type="hidden" name="rid" id="rid" value="<?php echo $rid; ?>">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">Send Schedule</button>
                        <a href="acceptedrequest.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
