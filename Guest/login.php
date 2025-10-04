<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style1.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="loader-overlay" id="loader-overlay"></div>

    <!-- Website Logo -->
    <a href="index.php" class="login-logo">Job<span>Entry</span></a>

    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <!-- Sign In Form -->
          <form action="loginaction.php" method="post" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" />
            </div>
            <input type="submit" name="submit" value="Login" class="btn solid" />
          </form>
          <form action="loginaction.php" method="post" class="sign-up-form">
           <div class="sign-up-choice">
            <h2 class="title">Sign up</h2>
            <p>Please select your registration type:</p>
           <div class="choice-buttons">
  <button type="button" class="btn" onclick="window.location.href='register.php'">
    <i class="fas fa-building"></i> Company Registration
  </button>
  <button type="button" class="btn" onclick="window.location.href='userregister.php'">
    <i class="fas fa-user"></i> Customer Registration
  </button>
</div>

          </div>
          </form>
        </div>
      </div>
      <!-- Panels -->
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h1>New here ?</h1>
            <p>Create your account to get started.</p>
            <button class="btn transparent" id="sign-up-btn">Sign up</button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h1>One of us ?</h1>
            <p>Please log in to access your account.</p>
            <button class="btn transparent" id="sign-in-btn">Sign in</button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
