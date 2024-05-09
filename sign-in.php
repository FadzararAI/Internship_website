<?php
  session_start();
  if(isset($_SESSION["type"])){
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" type="text/css" href="Signin.css" />
    <title>Sign-In</title>
  </head>
  <body>
     <!-- navigation start -->
    <nav class="nav">
      <div class="navigation">
        <img src="./images/hero_logo.png" alt="logo" class="logo" />
        <div class="links">
          <a href="index.php">Home</a>
          <a href="companies.php">Companies</a>
          <a href="jobsearch.php">Find Jobs</a>
        </div>
      </div>
      <div class="profile">
      <?php
        if(!isset($_SESSION["type"])){
            echo "<a href='sign-in.php'>Sign In</a>";
          }
      ?>
      </div>
    </nav>
    <!-- navigation end -->
    <!-- Sign in box -->
    <section class="signin-container">
      <div class="signin-box">
        <div class="header-text">
          <h1>Sign in</h1>
          </div>
        <form method="POST" action="./functions/authenticate.php">
            <div class="inputs">
              <label>Email Address</label>
              <input type="text" name="email">
              <label>Password</label>
              <input type="password" name="password">
              <span>Forgot Password?</span>
            </div>
            <div class="lowers">
              <input type="submit" value="Sign In" name="signin">
              <h4>Don't have an account? <a style="text-decoration: none;" href="sign-up.php"><span>Sign up!</span></a></h4>
          </div>
        </form>
      </div>
    </section>
    <!-- end of Sign in -->
    <!-- footer start -->
    <footer>
      <div class="top-container">
        <p class="titles">InternLink</p>
        <div class="box-navigation">
          <div class="navigation">
            <p>Internship website</p>
            <p>Contact</p>
            <p>Help</p>
          </div>
          <div class="navigation">
            <p>For Jobseekers</p>
            <p>Salaries</p>
            <p>Recent Jobs</p>
          </div>
          <div class="navigation">
            <p>For Employers</p>
            <p>Post A Job</p>
            <p>Market Insights</p>
          </div>
        </div>
      </div>
      <div class="bottom-container">
        <div class="social-media-icons">
          <a href="">
            <img src="./images/icons/image 8.png" alt="image" />
          </a>
          <a href="">
            <img src="./images/icons/instagram.png" alt="image" />
          </a>
          <a href="">
            <img src="./images/icons/facebook.png" alt="image" />
          </a>
          <a href="">
            <img src="./images/icons/x.png" alt="image" />
          </a>
          <a href="">
            <img
              src="./images/icons/youtube.png"
              alt="image"
              width="34"
              height="34"
            />
          </a>
        </div>
        <p>Copyright © 2024 Internship website. All Rights Reserved.</p>
      </div>
    </footer>
    <!-- footer end -->
  </body>
  </html>