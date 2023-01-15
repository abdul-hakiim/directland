<?php
//declare variable
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//getting the all values from the $_POST superglobal variable
$name = $_POST['name'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$state = $_POST['state'];


$postcode_query = "SELECT id FROM postcode WHERE postcode = '$postcode'";   //SELECT query that retireves the id of postcode
$postcode_result = $conn->query($postcode_query);   //execute the query and store the result in a variable
$postcode_id = 0;   //initialize a variable to store the postcode id
if ($postcode_result->num_rows > 0) {   //to check if the query returned any rows. if yes, execute code inside the block
    while($row = $postcode_result->fetch_assoc()) {    //fetch the result row by row and store the data in an associative array
        $postcode_id = $row['id'];  //get the postcode id from the associative array
    }
}

$age = date_diff(date_create($dob), date_create('today'))->y;   //calculate the age based on the date of birth passed in the var

$insert_query = "INSERT INTO customer (name, dob, address, postcode_id) VALUES ('$name', '$dob', '$address', '$postcode_id')";
if ($conn->query($insert_query) === TRUE) {     //check if the query was executed successfully
    echo "New record created successfully";
} else {
    echo "Error: " . $insert_query . "<br>" . $conn->error;
}

$conn->close();     //close the connection to the database
?>