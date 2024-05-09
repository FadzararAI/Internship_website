<?php
  session_start();
  if(isset($_SESSION["type"])){
    if($_SESSION['type'] != 'company'){
      header('Location: index.php');
    }
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
    <link rel="stylesheet" type="text/css" href="addjob.css" />
    <title>Add job listing</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
     <!-- navigation start -->
    <nav class="nav">
      <div class="navigation">
        <img src="./images/hero_logo.png" alt="logo" class="logo" />
        <div class="links">
          <a href="index.php">Home</a>
          <a href="companies.php">Companies</a>
          <a href="jobsearch.php">View Jobs</a>
          <a href='add-job.php'>Post a job</a>
        </div>
      </div>
      <div class="profile">
        <a href="company_profile.php">Company Profile</a>
        <a href="logout.php">Logout</a>
      </div>
    </nav>
    <!-- navigation end -->
    <section class="addjob-container">
      <div class="add-container">
        <div class="backbtn" onclick="history.go(-1)">
            <span>&#8592;</span>
            <font>Go back</font>
          </div>
          <h2 style="text-align: center;">Post a Job-listing</h2>
          <div class="add-body">
            <form method="POST" action="./functions/postjob.php">
                <fieldset>
                    <legend>Job Title</legend>
                    <input type="text" name="jobtitle">
                </fieldset>
                <fieldset>
                    <legend>Job Location</legend>
                    <select name="location">
                      <option value="Jakarta">Jakarta</option>
                      <option value="Surabaya">Surabaya</option>
                      <option value="Bandung">Bandung</option>
                    </select>
                </fieldset>
                <fieldset>
                    <legend>Job type</legend>
                    <input type="radio" name="job-type" value="WFO"> WFO
                    <input type="radio" name="job-type" value="WFH"> WFH
                </fieldset>
                <fieldset>
                    <legend>Salary</legend>
                    Rp.
                    <input type="text" name="salary">
                    /Months
                </fieldset>
                <fieldset>
                    <legend>Job field</legend>
                    <select name="type">
                      <option value="Technology">Technology</option>
                      <option value="Finance">Finance</option>
                      <option value="Marketing">Marketing</option>
                    </select>
                </fieldset>
                <fieldset>
                    <legend>Bonuses</legend>
                    <ul>
                        <li>
                            <input type="text" name="bonuses[]">
                        </li>
                        <button id="resp-add" type="button" class="resp-add rowbtn">+</button>
                    </ul>
                </fieldset>
                <fieldset>
                    <legend>Job Responsibilities</legend>
                    <ul>
                        <li>
                            <input type="text" name="responb[]">
                        </li>
                        <button id="resp-add" type="button" class="resp-add rowbtn">+</button>
                    </ul>
                </fieldset>
                <fieldset>
                    <legend>Qualifications</legend>
                    <ul>
                        <li>
                            <input type="text" name="quals[]">
                        </li>
                        <button id="resp-add" type="button" class="resp-add rowbtn">+</button>
                    </ul>
                </fieldset>
                <fieldset>
                    <legend>Duration</legend>
                    <input type="text" name="duration">Month
                </fieldset>
                <div class="form-buttons">
                  <!-- <button id="prevbtn" type="button">Previous</button> -->
                  <input type="submit" value="Post Job" name="post">
              </div>
            </form>
          </div>
</div>
    </section>
    <script>
      $(document).ready(function(){
    // Function to add input fields
    $(".resp-add").click(function(){
        var inputContainer = $(this).closest("fieldset");
        var newInput = $('<li><input type="text" id="new" name="' + inputContainer.find('input').attr('name') + '"></li>');
        // Create remove button
        var removeButton = $('<button type="button" class="resp-remove rowbtn2">-</button>');
        // Append new input field and remove button to container
        inputContainer.append(newInput).append(removeButton);
    });

    // Function to remove input fields
    $(document).on("click", ".resp-remove", function(){
        // Remove the input field preceding the clicked remove button
        $(this).prev("li").remove();
        // Remove the remove button itself
        $(this).remove();
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