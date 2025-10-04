<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();

// assume companyid is stored in session after login
$cid = $_SESSION['Login_id'];

// fetch company details
$sql = "SELECT name, photo FROM tbl_jobseeker WHERE jobseekerid='$cid'";
$res = $obj->executequery($sql);
$row = mysqli_fetch_assoc($res);
$companyName = $row['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JobEntry - Job Portal Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .user-avatar {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border: 2px solid #0d6efd;
            border-radius: 50%;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .user-avatar:hover {
            transform: scale(1.05);
            border-color: #0b5ed7;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-card {
            background-color: #f8f9fa;
            border: 2px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .register-card:hover {
            background-color: #e2e6ea;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .register-card h5 {
            margin-top: 10px;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">JobEntry</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="alljobs.php" class="dropdown-item">Job List</a>
                            <a href="allcategory.php" class="dropdown-item">Job Category</a>
                        </div>
                    </div>
                    <a href="notifications.php" class="nav-link d-flex align-items-center">
                        <i class="bi bi-bell" style="font-size: 1.1rem; line-height: 1;"></i>
                    </a>
                </div>

                <!-- User Profile Dropdown -->
                <div class="nav-item dropdown">
                    <a href="#" class="d-flex align-items-center nav-link dropdown-toggle" data-bs-toggle="dropdown" style="padding: 0 20px;">
                        <img src="../uploads/<?php echo $row['photo']; ?>" alt="User" class="user-avatar me-2">
                        <span class="d-none d-lg-inline fw-semibold text-primary"><?php echo $companyName; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end rounded-0 m-0 shadow">
                        <a href="profileview.php" class="dropdown-item">
                            <i class="fa fa-user me-2"></i> Profile View
                        </a>
                        <a href="..\Guest\login.php" class="dropdown-item text-danger">
                            <i class="fa fa-sign-out-alt me-2"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Register Modal Script -->
    <script>
        function openRegisterModal(event) {
            event.preventDefault();
            document.getElementById('registerModal').style.display = 'flex';
        }

        function closeRegisterModal() {
            document.getElementById('registerModal').style.display = 'none';
        }
    </script>
</body>
</html>
