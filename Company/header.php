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
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Requestes</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="requestview.php" class="dropdown-item">New Requestes</a>
                            <a href="acceptedrequest.php" class="dropdown-item">Accepted Requestes</a>
                        </div>
                    </div>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="joblist.php" class="dropdown-item">Job List</a>
                        </div>
                    </div>
                    
                    
                </div>
                <div>
                  
                <a href="postregister.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>  
                    </div>
                    <div>
                     <a href="..\Guest\login.php" class="btn btn-danger rounded-0 py-4 px-lg-5 d-none d-lg-block">

                        Logout <i class="fa fa-sign-out-alt ms-3"></i>
                    </a>
                      </div>
            </div>
        </nav>
        <!-- Navbar End -->
<script>
  function openRegisterModal(event) {
    event.preventDefault();
    document.getElementById('registerModal').style.display = 'flex';
  }

  function closeRegisterModal() {
    document.getElementById('registerModal').style.display = 'none';
  }
</script>

<!-- Modal CSS -->
<style>
  .modal-overlay {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
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
    box-shadow: 0 0 10px rgba(0,0,0,0.15);
  }

  .register-card h5 {
    margin-top: 10px;
    color: #333;
  }
</style>

