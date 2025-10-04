<?php
include("header.php");
include_once("../dboperation.php");

$obj = new dboperation();

// Fetch districts for dropdown filter
$sql_district = "SELECT * FROM tbl_district";
$res_district = $obj->executequery($sql_district);

// Handle filter submission
$where = " WHERE c.status='accepted' ";
$selected_district = '';
$selected_location = '';
if (isset($_GET['districtid']) && $_GET['districtid'] != '') {
    $selected_district = $_GET['districtid'];
    $where .= " AND l.districtid='$selected_district'";
}
if (isset($_GET['locationid']) && $_GET['locationid'] != '') {
    $selected_location = $_GET['locationid'];
    $where .= " AND c.locationid='$selected_location'";
}

// Fetch companies with join
$sql = "SELECT c.*, l.locationname, d.districtname 
        FROM tbl_company c
        INNER JOIN tbl_location l ON l.locationid = c.locationid
        INNER JOIN tbl_district d ON d.districtid = l.districtid
        $where";
$res = $obj->executequery($sql);
?>

<!-- Header -->
<div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Companies</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Companies</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Filter Section -->
<div class="container mb-4 text-center">
    <form method="GET" class="row g-3 justify-content-center">
        <div class="col-auto">
            <select class="form-select" id="districtFilter" name="districtid">
                <option value="">All Districts</option>
                <?php while ($d = mysqli_fetch_assoc($res_district)) { ?>
                    <option value="<?php echo $d['districtid']; ?>">
                        <?php echo $d['districtname']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="col-auto">
            <select class="form-select" id="locationFilter" name="locationid">
                <option value="">All Locations</option>
                <?php
                // Pre-populate locations if district is selected
                if ($selected_district != '') {
                    $loc_sql = "SELECT * FROM tbl_location WHERE districtid='$selected_district'";
                    $loc_res = $obj->executequery($loc_sql);
                    while ($l = mysqli_fetch_assoc($loc_res)) {
                        ?>
                        <option value="<?php echo $l['locationid']; ?>">
                            <?php echo $l['locationname']; ?>
                        </option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>
</div>

<!-- Companies Grid -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5">Explore Companies</h1>
        <div class="row g-4">
            <?php while ($r = mysqli_fetch_assoc($res)) { ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="company-card p-4 h-100 text-center">
                        <div class="logo-bg mb-3">
                            <img src="../uploads/<?php echo $r['photo']; ?>" alt="Logo" class="company-logo">
                        </div>
                        <h5 class="mb-1 fw-semibold"><?php echo $r['name']; ?></h5>
                        <p class="text-muted small mb-1"><?php echo $r['description']; ?></p>
                        <p class="text-muted small mb-3"><strong><?php echo $r['districtname']; ?></strong> - <?php echo $r['locationname']; ?></p>
                        <a href="joblist.php?cid=<?php echo $r['companyid']; ?>" class="btn btn-primary btn-sm px-4 rounded-pill">View Jobs</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


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
  object-fit: cover;
}
.btn-primary {
  background-color: #39a560ff;
  border: none;
}
.btn-primary:hover {
  background-color: #2ca95aff;
}

</style>
<script src="../jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $("#districtFilter").change(function () {
        var district_id = $(this).val();
        $.ajax({
            url: "getlocation.php",
            method: "POST",
            data: { districtid: district_id },
            success: function (response) {
                $("#locationFilter").html(response);
            },
            error: function () {
                $("#locationFilter").html("<option>Error loading locations</option>");
            }
        });
    });
});
</script>

<?php include("footer.php"); ?>
