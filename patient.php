
<?php
 
// Starting the session, to use and
// store data in session variable
session_start();
  
// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login.php');
}
  
// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <style><?php include 'style.css'; ?></style> 
    <title>Add Patient</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>


    <fieldset >
    <div style="text-align:left; margin-left:69px; margin-top:5px"><img src="pic.jpg" /></div>
    <h1 id="nambs">NATEMBEA</h1>
    <strong><h6 id="healthclinic">HEALTH CLINIC</h6></strong>

  
    <div class="dropdown">
    <button class="droptn"> 
    <?php echo $_SESSION['username']; ?><i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="staff.php">Add Admin Account</a>
      <a href="patient.php">Add Patient Account</a>
      <a href="index.php?logout='1'" style="color: white;">
                    Click here to Logout</a>
    </div>
    </div>
    </fieldset>

    <div class="navbar">

        <button class="subnavbtn"> <i class="fa fa-calendar" style="font-size:20px;color:green"></i>
          Visit
        <div class="subnav-content">
          <a href="addpatientvisit.php">Add Patient Visit</a>
          <a href="viewpatienthistory.php">View Patient History</a>
        </div> 
        </button>  

        <a  href="clinical_analysis.php"> <i class="fa fa-bar-chart" style="font-size:20px;color:green">
        </i> Clinical Analysis</a>

    

        <button class="subnavbtn"> <i class="fa fa-user" style="font-size:20px;color:green"></i>
          Patient Medical Profile
        <div class="subnav-content">
          <a href="addmedicalprofile.php">Add Patient Medical Profile</a>
          <a href="searchoption.php">View Patient Medical Profile</a>
        </div> 
        </button>  

    </div> 


      <h2 style="margin-left:100px">Create Patient Account</h2><br>

      <p class=" intro">Enter all necessary fields</p>

      <form id="patientForm" action="patientproc.php" method="GET">
        <input class="nav" type="number" id="IDnumber" name="IDnumber" placeholder="Enter Patient ID"  required><br><br>
        <input class="nav"type="text"  id="fullName" name="fullName" placeholder="Enter Patient Full Name"  required><br><br>
        <input class="nav"type="text"  id="email" name="email" placeholder="Enter Patient Email Address"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><br><br>
        <input class="nav"type="date"   id="patientDate" name="patientDate" placeholder="Enter Date of Birth"  required><br><br>
        <input class="nav"type="text"  id="occupation" name="occupation" placeholder="Enter Patient Occupation"  required><br><br>
        <input class="nav"type="text"  id="gender" name="gender" placeholder="Gender"  required><br><br>
        <input class="nav" type="number" id="contact" name="contact" placeholder="Enter Patient Contact"  required><br><br> 
        <input class="nav" type="address" id="address" name="address" placeholder="Enter Patient Address"  required><br><br>
        <input class="navar" type="Submit" name="submit" value="Submit "value="Click to Submit"><br><br>
    </form>

      
      </div>
      