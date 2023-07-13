
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
    <title>View Insurance Summary</title>
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

        
      <a  href="insurance.php"> <i class="fa fa-file-text-o" style="font-size:20px;color:green">
      </i> Insurance</a>

        <button class="subnavbtn"> <i class="fa fa-user" style="font-size:20px;color:green"></i>
          Patient Medical Profile
        <div class="subnav-content">
          <a href="addmedicalprofile.php">Add Patient Medical Profile</a>
          <a href="searchoption.php">View Patient Medical Profile</a>
        </div> 
        </button>  

    </div> 

      <div class="myheader">

      <h2 style="text-align:left;">Various types of Insurance available to patients</h2>

  
      </div>
     <br>
     <br>
      <table class="content-table">
      <tr>
      <th>Insurance ID</th>
      <th>Type of Insurance</th>
      <th>Insurance Company Name</th>
      <th>Insurance Details</th>
      <th>Update</th>
      </tr>

      <?php
        //database connection parameters
        $servername = "localhost";
        $username = "health";
        $password = "password";
        $dbname = "Natembea_Health_Centre";

          // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

      $sql= "SELECT * FROM insurance";     

      $res = mysqli_query($conn,$sql);

    
      while($row = mysqli_fetch_array($res))

     {
      ?>
         <tr>
         <td><?php echo $row['insurance_id']; ?></td>
         <td><?php echo $row['insurance_type']; ?></td>
         <td><?php echo $row['insurance_name']; ?></td>
         <td><?php echo $row['insurance_details']; ?></td>
         <td style="padding:14px 16px;"><?php echo $row['insurance_details']; ?></td>
         <td><a href="updateinsurance.php?insurance_id=<?php echo $row["insurance_id"]; ?>">Update</a></td>
         </tr>
         
      
         <?php
     }
    ?>
    </table>
    <script type="text/javascript" src="tablesort.js"></script>
  </body>
</html>

	
	