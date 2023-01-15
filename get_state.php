<?php 
//getting the postcode value from the $_POST superglobal variable
$postcode = $_POST['postcode'];     // this variable contains data that is sent to the server via a POST request

//connect to the database
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

$stmt = $conn->prepare("SELECT state FROM postcode WHERE postcode = ?"); //creating a prepared statement using the mysqli object's prepare() method
$stmt->bind_param("i", $postcode); //binds the value of the user-entered postcode to the placeholder using the bind_param() method. 
//The "i" parameter in the method is used to specify that the parameter is an integer.
$stmt->execute(); //execute the prepared statement
$result = $stmt->get_result();  //retirieves the result of the query

if ($result->num_rows > 0) {    //checks if the number of rows returned by the query is greater than 0
    $row = $result->fetch_assoc();  //fetches the first row of the result as an associative array
    $state = $row['state'];     //assigns the value of the "state" column to a variable called $state
    echo $state;
} else {
    echo "No state found for that postcode";
}

$conn->close();     //close database connection
?>