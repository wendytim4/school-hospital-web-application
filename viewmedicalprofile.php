<?php

//check if register form was submited
//by checking if the submit button element name was sent as part of the request

if (isset($_GET['Submit'])) 
{

    //collection form data
	$search =  $_GET['search'];



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


    $sql = "INSERT INTO patient (patient_id, Name, dob, occupation, gender, contact, address, email ) 
    VALUES ('$idNumber', '$fullName', ' $patientDate', ' $occupation', ' $gender',
    '$contact', '$address','$email' )";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("Location: patient.php");

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    

}

else{
    header("Location:patient.php");
}

mysqli_close($conn);

?>
