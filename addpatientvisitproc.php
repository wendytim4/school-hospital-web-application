<?php

//check if register form was submited
//by checking if the submit button element name was sent as part of the request

if (isset($_GET['submit'])) 
{
       //collection form data
	$idNumber =  $_GET['iDnumber'];
	$studentName = $_GET['fullName'];
    $patientDate = $_GET['patientDate'];
    $StaffName = $_GET['StaffName'];
    $staffnumber= $_GET['staffnumber'];
    $prescription= $_GET['prescription']; 
    $disease= $_GET['disease']; 
    $symptoms= $_GET['symptoms']; 
    

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


    $sql = "INSERT INTO visit (patient_id, staff_id, 
    visit_date, visit_diagnosis , visit_prescriptions, symptoms ) 
    VALUES ('$idNumber', '$staffnumber', ' $patientDate',
    '$disease', '$prescription','$symptoms')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("Location: addpatientvisit.php");

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    

}

else{
    header("Location:addpatientvisit.php");
}

mysqli_close($conn);

?>
