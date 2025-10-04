<?php include("header.php");
include_once("../dboperation.php");
$obj = new dboperation();
$sql = "SELECT * FROM tbl_plan";
$result = $obj->executequery($sql);
$cid=$_GET["cid"];
?>

<style>
    .plan-card {
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .plan-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.1);
    }
    .plan-header {
        background: linear-gradient(135deg, #23b54dff, #09a05aff);
        color: #fff;
        padding: 20px;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
    .plan-price {
        font-size: 24px;
        font-weight: bold;
        color: #198754;
    }
    .plan-features {
        text-align: left;
        margin-top: 15px;
    }
    .plan-features li {
        margin-bottom: 8px;
    }
</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5 fw-bold">Employer Subscription Plans</h2>
            <div class="row g-4">
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <div class="col-md-4">
                        <div class="card shadow plan-card h-100">
                            <div class="plan-header text-center">
                                <h4 class="mb-0"><?php echo $row['plan_name']; ?></h4>
                            </div>
                            <div class="card-body text-center">
                                <p class="plan-price">₹<?php echo $row['amount']; ?></p>
                                <p>
                                    Validity: <strong><?php echo $row['duration']; ?></strong> days<br>
                                </p>
                                <form action="companypaymentaction.php" method="post" class="mt-3">
                                    <input type="hidden" name="plan_id" value="<?php echo $row['plan_id']; ?>">
                                    <input type="hidden" name="amount" value="<?php echo $row['amount']; ?>">
                                    <input type="hidden" name="companyid" value="<?php echo $cid; ?>">
                                    <button type="submit" class="btn btn-success w-100">Subscribe Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
