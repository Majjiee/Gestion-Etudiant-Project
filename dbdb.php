<?php

// Include the connection file
include ('conn.php');
$cn= new Connection();
// Create an instance of the Connection class

// Call the selectDatabase method to select the database "MyPhpDb"
$cn->selectDatabase('MyPhpDb');

$query = "
CREATE TABLE our_Client (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        CIN VARCHAR(30),
        phonenumber INT NOT NULL,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50) UNIQUE,
        password VARCHAR(80)
    )";

// Call the createTable method to execute the query and create the table
$r = mysqli_query($cn->conn, $query);

if ($r) {
    echo "Table created successfully";
} else {
    echo "Table creation error: " . mysqli_error($cn->conn);
}

?>