
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
    <title>View Patient Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
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
    <br>

      <h2 class="cont">View Patient History</h2>

<br>
      
      <div class="topnavar">
        
      <form method="POST">
      <i class="fa fa-search"></i>
      <input type="text" name="patient_id" placeholder="Enter Patient ID">
      <input type ="submit" value="search" name="submit">
      </form> 
      </div>    


<?php

if(isset($_POST["submit"]))

{

    
    //database connection parameters
	$servername = "localhost";
	$username = "health";
	$password = "password";
	$dbname = "Natembea_Health_Centre";

    // Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
	if ($conn->connect_error) {
		//stop executing the code and echo error
	  die("Connection failed: " . $conn->connect_error);
	} 

    $patient_id = $_POST['patient_id'];
    

    $dbinfo = "SELECT patient.Name,patient.gender, medical_profile.vaccinations,
     medical_profile.full_blood_count_test,medical_profile.hepatitis,
    medical_profile.allergy, patient.patient_id,patient.email,
    patient.dob,patient.occupation, patient.address,patient.contact 
    FROM patient INNER JOIN medical_profile ON patient.patient_id=medical_profile.patient_id
    WHERE patient.patient_id like '%$patient_id%'";

    $res = mysqli_query($conn, $dbinfo);
    
    if($row = mysqli_fetch_array($res))
    {
      ?>
        
        
           

            <br>
            <br>
            <div class="account">
    
              <div class="row">
                <div class="col">
                  <h3>Full Name:</h3>
               </div>
               <div class="secondary">
               <?php echo $row['Name']; ?>
               </div>
            </div>

            <div class="row">
                <div class="col">
                  <h3>Gender:</h3>
               </div>
               <div class="secondary">
               <?php echo $row['gender']; ?>
               </div>
            </div>

            <div class="row">
                <div class="col">
                  <h3>patent ID:</h3>
               </div>
               <div class="secondary">
               <?php echo $row['patient_id']; ?>
               </div>
            </div>

            <div class="row">
                <div class="col">
                  <h3>Email:</h3>
               </div>
               <div class="secondary">
               <?php echo $row['email']; ?>
               </div>
            </div>

            <div class="row">
                <div class="col">
                  <h3>Date Of Birth:  </h3>
               </div>
               <div class="secondary">
               <?php echo $row['dob']; ?>
               </div>
            </div>

            <div class="row">
                <div class="col">
                  <h3>Occupation: </h3>
               </div>
               <div class="secondary">
               <?php echo $row['occupation']; ?>
               </div>
            </div>

            <div class="row">
                <div class="col">
                  <h3>Address</h3>
               </div>
               <div class="secondary">
               <?php echo $row['address']; ?>
               </div>
            </div>

            <div class="row">
                <div class="col">
                  <h3>Contact:</h3>
               </div>
               <div class="secondary">
               <?php echo $row['contact']; ?>
               </div>
            </div>


        
         <div class="medicalinfo">
            <div class="row">
                <div class="col-md">
                  <h3>Vaccinations: </h3>
               </div>
               <div class="col -md -9 text secondary">
               <?php echo $row['vaccinations']; ?>
               </div>
            </div>
            <div class="row">
                <div class="col">
                  <h3>FBC Test: </h3>
               </div>
               <div class="col -md -9 text secondary">
               <?php echo $row['full_blood_count_test']; ?>
               </div>
            </div>
            <div class="row">
                <div class="col">
                  <h3>hepatitis: </h3>
               </div>
               <div class="col -md -9 text secondary">
               <?php echo $row['hepatitis']; ?>
               </div>
            </div>
            <div class="row">
                <div class="col">
                  <h3>Allergy: </h3>
               </div>
               <div class="col -md -9 text secondary">
               <?php echo $row['allergy']; ?>
               </div>
            </div>  
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
           
            
            <div class="row">
                <div class="col">
                  <p style="margin-left:10px; ">
        
            </div> 

            
        </div>
    </div>

<?php  
    }
    else{
        echo "Student Does not exist"; 
      }

  }
 
?>
</body>
</html>

	

	
