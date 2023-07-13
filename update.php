
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


<?php

$servername = "localhost";
$username = "health";
$password = "password";
$dbname = "Natembea_Health_Centre";

// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    //stop executing the code and echo error
  die("Connection failed: " . $conn->connect_error);
} 






if(count($_POST)>0)

 {
mysqli_query($conn, "UPDATE visit INNER JOIN patient ON patient.patient_id=visit.patient_id
INNER JOIN staff ON staff.staff_id=visit.staff_id
SET  visit.visit_date='".$_POST['visit_date']."' , visit.visit_diagnosis='".$_POST['visit_diagnosis']."',
 patient.Name='".$_POST['Name']."', staff.fullName='".$_POST['fullName']."',
patient.patient_id='".$_POST['patient_id']."',visit.visit_id='".$_POST['visit_id']."',
visit.visit_prescriptions='".$_POST['visit_prescriptions']."', visit.symptoms='".$_POST['symptoms']."'
 WHERE visit.visit_id='".$_POST['visit_id']."' ");

$message = "<p style='color:green; margin-left:100px; font-weight:bold'>Record Modified Successfully !</p>";
}


$row = mysqli_query($conn,"SELECT visit.visit_id,visit.visit_date,patient.Name, 
patient.patient_id,
visit.symptoms, visit.visit_diagnosis,
visit.visit_prescriptions,staff.fullName
FROM visit INNER JOIN patient ON patient.patient_id=visit.patient_id
INNER JOIN staff ON staff.staff_id=visit.staff_id ORDER BY visit_date");     



$row=mysqli_fetch_array($row);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <style><?php include 'style.css'; ?></style>  
    <title>View Patient Home Page</title>
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
	<br>
	<br>
	<br>
	<br>
	<br>

    <form  id="visitForm"  method="POST" action="">
	<div><?php if(isset($message)) { echo $message; } ?>
    </div>
	<input class="nav" type="datetime-local" name="visit_date" placeholder="Visit Date" value="<?php echo $row['visit_date']; ?>"><br><br>
	<input class="nav"type="text" name="Name" placeholder="Patient Full Name" value="<?php echo $row['Name']; ?>"><br><br>
	<input class="nav" type="number" name="patient_id" placeholder="Patient ID" value="<?php echo $row['patient_id']; ?>" ><br><br>
	<input class="nav" type="symptoms" name="symptoms" placeholder="Symptoms" value="<?php echo $row['symptoms']; ?>"><br><br>
	<input class="nav" type="text" name="visit_diagnosis" placeholder="Visit Diagnosis" value="<?php echo $row['visit_diagnosis']; ?>"><br><br>
	<input class="nav"type="text" name="visit_prescriptions" placeholder="Visit Prescriptions" value="<?php echo $row['visit_prescriptions']; ?>"><br><br>
	<input class="nav" type="fullName" name="fullName" placeholder="Staff full Name" value="<?php echo $row['fullName']; ?>"><br><br>
  <input class="nav" type="number" name="visit_id" placeholder="Visit ID" value="<?php echo $row['visit_id']; ?>"><br><br>
	<input class="navar" type="submit" name="submit" value="update">
		
</form>



</body>
</html>