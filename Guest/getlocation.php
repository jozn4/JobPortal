<?php
if (isset($_POST["districtid"])) {
    $districtid = $_POST["districtid"];

    // You can replace this code with a database query to retrieve the states for the selected country
    include_once("../dboperation.php");
    echo $sql = "select * from tbl_location where districtid=$districtid";
    $obj = new dboperation();
    $result = $obj->executequery($sql);
    $s = 1;
    ?>

    <option value="">--------Select location-----------</option>
    <?php while ($r = mysqli_fetch_array($result)) { ?>
        <option value="<?php echo $r["locationid"]; ?>"><?php echo $r["locationname"]; ?></option>
    <?php } ?>

    <?php
}
?>