<?php
  session_start();
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
    <link rel="stylesheet" type="text/css" href="companies.css" />
    <title>Companies</title>
  </head>
  <body>
    <!-- navigation start -->
    <nav class="nav">
      <div class="navigation">
        <img src="./images/hero_logo.png" alt="logo" class="logo" />
        <div class="links">
          <a href="index.php">Home</a>
          <a href="companies.php">Companies</a>
          <?php
          if(isset($_SESSION["type"])){
            if(trim($_SESSION["type"]) == 'company'){
              echo "<a href='jobsearch.php'>View jobs</a>";
              echo "<a href='add-job.php'>Post a job</a>";
            }else{
              echo "<a href='jobsearch.php'>Find Jobs</a>";
            }
          }else{
            echo "<a href='jobsearch.php'>Find Jobs</a>";
          }
          ?>
        </div>
      </div>
      <div class="profile">
        <?php
          if(!isset($_SESSION['type'])){
            echo "<a href='sign-in.php'>Sign In</a>";
          }elseif(isset($_SESSION['type'])){
            if(trim($_SESSION['type']) == 'company'){
              echo "<a href='company_profile.php'>Company Profile</a>";
              echo "<a href='logout.php'>Logout</a>";
            }elseif(trim($_SESSION['type']) == 'student'){
              echo "<a href='my_profile.php'>My Profile</a>";
              echo "<a href='logout.php'>Logout</a>";
            }
          }
        ?>
      </div>
    </nav>
    <!-- navigation end -->
    <!-- search start -->
    <section class="search">
      <div class="search-container">
        <form method="GET" class="search-input">
          <label for="search">
            <img src="./images/icons/search.png" alt="search" />
          </label>
          <input
            type="text"
            name="company"
            id="search"
            placeholder="Search for company name"
          />
          <button name="search" type="submit" class="btn-submit">Find Company</button>
        </form>
      </div>
    </section>
    <!-- search end -->
    <hr />

    <!-- company list start -->
    <section class="company-list">
      <?php
        include './functions/config.php';
        $result = $conn->query("SELECT * FROM company");
        if(isset($_GET["search"])){
          $company_name = $_GET["company"];
          $result = $conn->query("SELECT * FROM company WHERE name LIKE '$company_name%'");
        }
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "<div class='company-box'>";
            echo "<div class='top-container'>";
            echo "<img src='./images/company_logos/".$row['logo_fname']."' />";
            echo "<p>".$row['name']."</p>";
            echo "</div>";
            echo "<div class='body-container'>";
            echo "<div class='rating'>";
            echo "<span class='fa fa-star checked'></span>";
            echo "<span class='fa fa-star checked'></span>";
            echo "<span class='fa fa-star checked'></span>";
            echo "<span class='fa fa-star'></span>";
            echo "<span class='fa fa-star'></span>";
            echo "</div>";
            echo "<p>12.3k reviews</p>";
            echo "</div>";
            echo "<div class='things'>";
            echo "<p>Salaries</p>";
            echo "<p>Questions</p>";
            echo "<p>Open Internships</p>";
            echo "</div></div>";
          }
        }
      ?>
    </section>
    <!-- company list end -->

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
