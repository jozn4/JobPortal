<?php include("header.php");
include_once("../dboperation.php");
$obj = new dboperation();
$sql = "SELECT * FROM tbl_plan";
$result = $obj->executequery($sql);
$cid=$_GET["cid"];
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="wow fadeInUp" data-wow-delay="0.5s">
                <h2 class="text-center mb-4">Choose Your Membership Plan</h2>
                <div class="row">
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <div class="col-md-4 mb-4">
                            <div class="card shadow border-0 h-100">
                                <div class="card-body text-center">
                                    <h4 class="card-title text-primary">
                                        <?php echo $row['plan_name']; ?>
                                    </h4>
                                    <p class="card-text">
                                        Duration: <strong><?php echo $row['duration']; ?></strong> days<br>
                                        Price: <strong>₹<?php echo $row['amount']; ?></strong>
                                    </p>
                                    <form action="paymentaction.php" method="post">
                                        <input type="hidden" name="plan_id" value="<?php echo $row['plan_id']; ?>">
                                        <input type="hidden" name="amount" value="<?php echo $row['amount']; ?>">
                                 <input type="hidden" name="cid" value="<?php echo $cid; ?>">

                                        <button type="submit" class="btn btn-success w-100">Pay Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
