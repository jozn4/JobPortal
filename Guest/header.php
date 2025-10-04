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
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="alljobs.php" class="dropdown-item">Job List</a>
                            <a href="allcategory.php" class="dropdown-item">Job Categories</a>
                        </div>
                    </div>
                   
                    <a href="contact.html" class="nav-item nav-link" onclick="openRegisterModal(event)">Register</a>
                </div>
                <a href="login.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">LOGIN<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->

<!-- Register Modal Start -->
<div id="registerModal" class="modal-overlay" style="display: none;">
  <div class="modal-box text-center" style="max-width: 600px; background-color: white; padding: 30px; border-radius: 10px; position: relative;">
    <button class="close-btn" onclick="closeRegisterModal()" style="position: absolute; top: 10px; right: 15px; background: none; border: none; font-size: 24px;">×</button>
    <h4 class="mb-4">Register As</h4>
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="register-card" onclick="window.location.href='register.php'">
          <img src="img/company.jpg" alt="Architect" class="img-fluid mb-2" style="height: 120px; object-fit: contain;">
          <h5>Company</h5>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="register-card" onclick="window.location.href='userregister.php'">
          <img src="img/user" alt="Customer" class="img-fluid mb-2" style="height: 120px; object-fit: contain;">
          <h5>Customer</h5>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Register Modal End -->


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

