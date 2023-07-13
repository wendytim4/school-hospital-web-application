<?php

//check if register form was submited
//by checking if the submit button element name was sent as part of the request

if (isset($_GET['submit'])) 
{

    //collection form data
	$patient_id =  $_GET['patient_id'];
    $vaccinations=  $_GET['vaccinations'];
    $fullBloodCount=  $_GET['fullBloodCount'];
    $hepatitis =  $_GET['hepatitis'];
    $allergy =  $_GET['allergy'];


    //database connection parameters
	$servername = "localhost";
	$username = "health";
	$password = "password";
	$dbname = "Natembea_Health_Hentre";

    // Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
	if ($conn->connect_error) {
		//stop executing the code and echo error
	  die("Connection failed: " . $conn->connect_error);
	} 


    $sql = "INSERT INTO medical_profile (vaccinations, full_blood_count_test, hepatitis, patient_id,allergy ) 
    VALUES ('$vaccinations', ' $fullBloodCount', ' $hepatitis', '$patient_id', '$allergy')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("Location: addmedicalprofile.php");

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    

}

else{
    header("Location:patient.php");
}

mysqli_close($conn);

?>
