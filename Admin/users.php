<?php
include("header.php");
include_once("../dboperation.php");
$obj = new dboperation();

$s = "SELECT * FROM tbl_jobseeker j INNER JOIN tbl_location l ON j.locationid = l.locationid";
$res = $obj->executequery($s);
?>

<style>
    .custom-table-header th {
        background-color: #0d6efd;
        color: white;
        text-align: center;
    }

    .table td, .table th {
        vertical-align: middle !important;
        text-align: center;
        white-space: nowrap;
    }

    .table td img {
        display: block;
        margin: auto;
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .btn-action {
        margin: 2px;
        min-width: 75px;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .truncate {
        max-width: 120px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="mb-4 text-dark fw-semibold">User Requests</h4>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle table-bordered">
                            <thead class="custom-table-header">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Qualification</th>
                                    <th>DOB</th>
                                    <th>Reg Date</th>
                                    <th>Location</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                   <th>Plan ID</th>
                                  <th>Renewaldate</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($r = mysqli_fetch_array($res)) { 
                    
                                ?>
                                    <tr>
                                        <td><?php echo $r['jobseekerid']; ?></td>
                                        <td>
                                            <?php echo $r['name']; ?>
                                        </td>
                                        <td><img src="../uploads/<?php echo $r['photo']; ?>" alt="User Photo" /></td>
                                        <td><?php echo $r['email']; ?></td>
                                        <td><?php echo $r['contactnum']; ?></td>
                                        <td><?php echo $r['qualification']; ?></td>
                                        <td><?php echo $r['dob']; ?></td>
                                        <td><?php echo $r['regdate']; ?></td>
                                        <td><?php echo $r['locationname']; ?></td>
                                        <td><?php echo $r['username']; ?></td> 
                                        <td><?php echo $r['password']; ?></td> 
                                      <td><?php echo $r['plan_id']; ?></td> 
                                        <td><?php echo $r['renewaldate']; ?></td>
                                       <td><?php echo $r['status']; ?></td> 
         

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php"); ?>
