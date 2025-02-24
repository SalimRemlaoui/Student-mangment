<?php
session_start();

// Database credentials
$host = "localhost";
$user = "root";
$password = "";
$db = "studentmangment";

// Create a new database connection
$conn = new mysqli($host, $user, $password, $db);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    // Prepare the SQL query using placeholders
    $sql = "SELECT * FROM user WHERE username = ?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters to the prepared statement
        $stmt->bind_param("s", $name);  // "s" means string (username)
        
        // Execute the statement
        $stmt->execute();
        
        // Get the result of the query
        $result = $stmt->get_result();
        
        // Check if a row was found
        if ($row = $result->fetch_assoc()) {
            // Check if the password is correct using password_verify (if hashed)
            if ($pass == $row['password']) {  // If passwords are not hashed
                $_SESSION['username'] = $name;
                $_SESSION['usertype'] = $row["usertype"];

                // Redirect based on user type
                if ($row["usertype"] == "student") {
                    header("Location: studenthome.php");
                    exit();
                } elseif ($row["usertype"] == "admin") {
                    header("Location: adminhome.php");
                    exit();
                }
            } else {
                $_SESSION['loginmessage'] = "Incorrect password!";
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['loginmessage'] = "No matching username found!";
            header("Location: login.php");
            exit();
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Failed to prepare the SQL statement: " . $conn->error;
    }
}
var_dump($row);  // Check what is returned

?>