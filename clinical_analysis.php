

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
    <title>Nurses Home Page</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- //connect to the library -->
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
    <div style="text-align:center"><h2>Analysis on the most occurred disease in Ashesi!</h2></div>
    <br>
    <br>
    <br>


	 <?php
   
	 	//database connection parameters
	 	//change the database name to suite what you have in phpmyadmin
		
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



		//write sql
		$sql = "select visit_diagnosis, count(visit_diagnosis)=count(1) 
    as Disease from Visit group by soundex(visit_diagnosis)";

    

		//execute sql
		$result = $conn->query($sql);

		//check if any record was found
		if ($result->num_rows > 0) 
		{
     
			//create an array
			$visit_diagnosis  = array();
      $Disease = array();

			  // loop through the query result and fetch one record at a time
			  while($row = $result->fetch_assoc()) 
			  {
				  	//add record to array 
				  	//the curtomer_counrtry is a field/column in the customer table based on the query on line 27
				  	array_push($visit_diagnosis, $row["visit_diagnosis"]);	
            array_push($Disease,$row["Disease"]); 
            
            

			   }//end of loop

         

		}//end of  if condition
		//close the connection to database
		$conn->close();
	?> 

	<!-- //starting drawing canvas -->
	<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

	<!-- //canvas script -->
<script>

	//change the content of the xvalues to be record from the database
	// var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];

	// example of record coming from database below
var xValues = <?php  

				//echo the array list on 39 and 46 as json list of items
				echo json_encode($visit_diagnosis);
			?>

var yValues = <?php  


//echo the array list on 39 and 46 as json list of items
      echo json_encode($Disease);
?>

var barColors = ["green","blue","orange","brown"];




	new Chart("myChart", {
	  type: "bar",
	  data: {
	    labels: xValues,
	    datasets: [{
	      backgroundColor: barColors,
	      data: yValues
	    }]
      
	  },
	  options: {
	    legend: {display: false},
	    title: {
	      display: true,
	      text: "Analysis of the number of patients with a certain Disease"
	    }
	  }
	});
	</script>


</body>
</html>
