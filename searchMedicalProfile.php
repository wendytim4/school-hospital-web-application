
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
    <title>Admin Insurance Summary</title>
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


      <h2>Insurance Summary</h2><br>

      <div class="insurancebox">
        <h1><i ></i> Patient Full Name</h1>
        <h3><i ></i> Insurance Company Name</h3>
        <input class="inbtn1" type="button" value="">
        <h3><i ></i> Member ID</h3>
        <input class="inbtn1" type="button" value="">
        <h3><i ></i> Company Details</h3>
        <input class="inbtn3" type="button" value="" >

    
      </div>

      
      </div>
      