
<?php
//session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "collegeregistration";

// Establish database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
// Get form data
$fullName = $_POST["fullName"];
$email = $_POST["email"];
$typeOfUser = $_POST["typeOfUser"];
$date = $_POST["date"];
$purpose = $_POST["purpose"];
$message = $_POST["message"];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}

// collect value of input field
$fullName = htmlspecialchars($_REQUEST['fullName']);
if (empty($fullName)) {
    echo "Name is empty";
} else {
    echo $fullName;
}

// Prepare and execute SQL query
$sql = "INSERT INTO response (fullName, email, typeOfUser, date, purpose, message) 
        VALUES ('$fullName', '$email', '$typeOfUser', '$date', '$purpose', '$message')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
}
?>