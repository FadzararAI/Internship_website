<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Internship website</title>
	<meta name="keywords" content="Internship, Application, Job, Salary, Employment">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" type="text/css" href="index.css" />
</head>
<body>
	<section class="upper">
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
	          }elseif(isset($_SESSION["type"])){
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
    <div class="hero">
    	<div class="search">
    		<h1>Find The Perfect Job For You</h1>
    		<form method="GET" action="jobsearch.php">
    			<div class="searches">
    				<input type="text" id="jobsearch" name="jobname" placeholder="Search for jobs.." title="Search a job title" required>
					<select id="locsearch" name="location" id="locs">
			            <option value="" selected>Search based by location..</option>
			            <option value="Jakarta">Jakarta</option>
			            <option value="Bandung">Bandung</option>
			        	<option value="Surabaya">Surabaya</option>
			        </select>
					<button type="submit">Find Job</button>
    			</div>
    		</form>
    	</div>
    </div>
	</section>
	<section class="categories">
		<h1>Explore By Category</h1>
		<div class="joblists">
			<div class="circle-container">
          <div class="circle">
            <img src="./images/icons/technology_bw.png">
          </div>
          <font>Technology</font>
        </div>
        <div class="circle-container">
          <div class="circle">
            <img src="./images/icons/finance.png">
          </div>
          <font>Finance</font>
        </div>
        <div class="circle-container">
          <div class="circle">
            <img src="./images/icons/administration.png">
          </div>
          <font>Administration</font>
        </div>
        <div class="circle-container">
          <div class="circle">
            <img src="./images/icons/marketing.png">
          </div>
          <font>Marketing</font>
        </div>
        <div class="circle-container">
          <div class="circle">
            <img src="./images/icons/hr.png">
          </div>
          <font>Human Resource</font>
        </div>
</div>
	</section>
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