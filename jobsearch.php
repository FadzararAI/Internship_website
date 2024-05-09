<?php
  session_start();
  if(!isset($_SESSION["type"])){
    $_SESSION["type"] = null;
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
    <link rel="stylesheet" type="text/css" href="jobsearch.css" />
    <title>Searching-page</title>
    <style>
      #details{
        display: none;
      }
    </style>
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
          }
          if(isset($_SESSION['type'])){
            if(trim($_SESSION["type"]) == 'company'){
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
          <input type="text" name="jobname" id="search" placeholder="Search for job title.." />
          <select name="location" id="locs">
            <option value="" selected>Search based by location..</option>
            <option value="Jakarta">Jakarta</option>
            <option value="Bandung">Bandung</option>
            <option value="Surabaya">Surabaya</option>
          </select>
          <button type="submit" class="btn-submit">Find Job</button>
        </form>
      </div>
    </section>
    <!-- search end -->
    <hr />
    <!-- job list start -->
    <section class="job-list">
      <div class='list-container'>
      <?php
      include './functions/config.php';
      $result = $conn->query("SELECT job_details.*,company.logo_fname FROM job_details LEFT JOIN company ON job_details.company_name = company.name");
      if(isset($_GET["jobname"])){
        $job_name = $_GET["jobname"];
        $job_location = $_GET["location"];
        $result = $conn->query("SELECT job_details.*,company.logo_fname FROM job_details  LEFT JOIN company ON job_details.company_name = company.name WHERE title LIKE '%$job_name%' AND location LIKE '%$job_location%'");
      }
      $id_num = "C" . strval(1);
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "<div class='list-box' id=".$row['id'].">";
            $id_num++;
            echo "<div class='top-container'>";
            echo "<div class='titles'>";
            echo "<img src='./images/company_logos/".$row['logo_fname']."' />";
            echo "<p>".$row['company_name'].'</p>';
            echo "</div>";
            echo "<img src='./images/icons/save.png' alt='save' />";
            echo "</div>";
            echo "<div class='body-container'>";
            echo "<p>".$row['title']."</p>";
            echo "<div>";
            echo "<p>".$row['job_kind']."</p>";
            echo "<p>".$row['location']."</p>";
            echo "</div>";
            echo "<p>".$row['type']."</p>";
            echo "<ul>";
            $bonus = explode(';',$row['bonuses']);
            for($x=0;$x<count($bonus);$x++){
              echo "<li>";
              echo $bonus[$x];
              echo "</li>";
            }
            echo "</ul>";
            echo "<div class='tags'>";
            echo "<div class='list'>";
            echo "<span>".$row['duration']." Months</span>";
            echo "<span>Rp. ".number_format($row['salary'])."/month</span>";
            echo "</div></div>";
            echo "<p>x days ago</p>";
            echo "</div></div>";
          }
        }
      ?>
      </div>
      <div class="detail-container" id="details">
        <div class="detail-box">
          <img src="./images/banner.png" alt="banner" />
          <div class="header-detail">
            <div class="logo">
              <img
                src="./images/company_logos/microsoft.png"
                alt="microsoft"
                width="100"
              />
            </div>
            <div class="body-container">
              <p class="titles">Microsoft</p>
              <p class="job">Administration</p>
              <div class="salary">
                <p>Work From Home</p>
                <p>Rp. 4,000,000/month</p>
              </div>
              <p class="location">Jakarta Pusat</p>
              <div class="action">
                <div class="action-detail">
                  <button id="applynow" class="apply">Apply Now</button>
                  <button>
                    <img src="./images/icons/save.png" alt="save" width="30" />
                  </button>
                </div>
                <div class="review">
                  <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                  </div>
                  <p>12.3k reviews</p>
                </div>
              </div>
            </div>
            <div class="detail-upper">
              <p>Internship details</p>
              <p>duration</p>
              <span>3 Months</span>
            </div>
            <div class="detail-description">
              <div class="detail-list">
                <p>Responsibilities:</p>
                <ul>
                  <li>
                    Assisting in the optimization of sales and operations
                    workflows
                  </li>
                  <li>
                    Fill out data tables Analyzing data and make decision of the
                  </li>
                  <li>
                    best offers Developing and processing daily reports
                    Developing
                  </li>
                  <li>and processing weekly reports</li>
                </ul>
              </div>
              <div class="detail-list">
                <p>Qualifications:</p>
                <ul>
                  <li>
                    Bachelor's degree in Business, Economics/ International
                    Business/ Law.
                  </li>
                  <li>Fluent in English</li>
                  <li>
                    Minimum of 4 year of experience in administrative or
                    operations support roles.
                  </li>
                  <li>
                    Proficiency in Microsoft Office Suite (Word, Excel, Outlook)
                    and other relevant software applications.
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- job list end -->
    <script>
      // Get all div elements with the class 'clickable-div'
    var clickableDivs = document.querySelectorAll('.list-box');

    var session_type = "<?php echo $_SESSION["type"]; ?>";
    if(session_type == "company"){
      document.getElementById("applynow").style.display = "none";
    }
    // Add click event listener to each div
    clickableDivs.forEach(function(div) {
        div.addEventListener('click', function() {
            // Reset border style for all divs
            clickableDivs.forEach(function(div) {
                div.style.border = 'var(--var-secondary) 3px solid'; // Default border style
            });
            document.getElementById("details").style.display = "flex";
            // Company Name
            var comp_name = this.getElementsByClassName("top-container")[0].querySelectorAll('p')[0].innerText;
            // Job position
            var job_pos = this.getElementsByClassName("body-container")[0].querySelectorAll('p')[0].innerText;
            // Job type
            var job_type = this.getElementsByClassName("body-container")[0].querySelectorAll('p')[1].innerText;
            // Job location
            var job_loc = this.getElementsByClassName("body-container")[0].querySelectorAll('p')[2].innerText;
            // Job duration
            var job_duration = this.getElementsByClassName("body-container")[0].querySelectorAll('span')[0].innerText;
            // Job salary
            var job_salary = this.getElementsByClassName("body-container")[0].querySelectorAll('span')[1].innerText;
            // Qualifications
            //console.log(document.getElementsByClassName("header-detail")[0].querySelectorAll('ul')[1].innerHTML);

            // Responsibilities
            //document.getElementsByClassName("header-detail")[0].querySelectorAll('ul')[0].innerHTML = "<li>a</li><li>b</li><li>c</li><li>d</li>";

            document.getElementsByClassName("header-detail")[0].querySelectorAll("img")[0].src=`./images/company_logos/${comp_name.toLowerCase()}.png`;
            document.getElementsByClassName("header-detail")[0].querySelectorAll('p')[0].innerText = comp_name;
            document.getElementsByClassName("header-detail")[0].querySelectorAll('p')[1].innerText = job_pos;
            document.getElementsByClassName("header-detail")[0].querySelectorAll('p')[2].innerText = job_type;
            document.getElementsByClassName("header-detail")[0].querySelectorAll('p')[3].innerText = job_salary;
            document.getElementsByClassName("header-detail")[0].querySelectorAll('p')[4].innerText = job_loc;
            document.getElementsByClassName("header-detail")[0].querySelectorAll('span')[5].innerText = job_duration;
            
            // Change border style for the clicked div
            this.style.border = 'var(--var-primary) 3px solid'; // Modify this to your desired border style
        });
    });
    </script>
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
