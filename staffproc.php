<?php

//check if register form was submited
//by checking if the submit button element name was sent as part of the request

if (isset($_GET['submit'])) 
{

    //collection form data
	$idNumber =  $_GET['IDnumber'];
	$staffname = $_GET['Name'];
    $email = $_GET['email'];
    $staffDate = $_GET['staffDate'];
    $occupation = $_GET['occupation'];
    $gender= $_GET['gender'];
    $contact= $_GET['contact'];
    $address= $_GET['address'];


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


    $sql = "INSERT INTO staff (staff_id, fullName, dob, position, gender, contact, address, email ) 
    VALUES ('$idNumber', '$staffname', ' $staffDate', ' $occupation', ' $gender','$contact', '$address','$email' )";

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
