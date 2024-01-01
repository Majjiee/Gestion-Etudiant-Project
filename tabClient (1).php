
<?php

class Client{

public $id;
public $CIN;
public $firstname;
public $lastname;
public $email;
public $password;
public $phonenumber;



public static $errorMsg = "";

public static $successMsg="";


public function __construct($firstname,$lastname,$email,$password ,
 $phonenumber, $CIN){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->email = $email;
    $this->CIN= $CIN;
    $this->phonenumber=$phonenumber;
    $this->password = password_hash($password,PASSWORD_DEFAULT);

}

// public function insertClient($tableName,$conn){

// //insert a client in the database, and give a message to $successMsg and $errorMsg
// $sql = "INSERT INTO $tableName (firstname,lastname,email,password,phonenumber,CIN)
// VALUES ('$this->firstname', '$this->lastname', '$this->email','$this->password','$this->phonenumber','$this->CIN')";
// if (mysqli_query($conn, $sql)) {
// self::$successMsg= "New record created successfully";

// } else {
//     self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// }
public function insertClient($tableName, $conn) {
    // Check if the email already exists
    $checkEmailQuery = "SELECT COUNT(*) FROM $tableName WHERE email = '$this->email'";
    $result = mysqli_query($conn, $checkEmailQuery);
    
    if ($result && mysqli_fetch_row($result)[0] > 0) {
        self::$errorMsg = "Error: Email already exists";
        return;
    }
    // Insert a new client into the database
    $sql = "INSERT INTO $tableName (firstname, lastname, email, password, phonenumber, CIN)
            VALUES ('$this->firstname', '$this->lastname', '$this->email','$this->password','$this->phonenumber','$this->CIN')";
    if (mysqli_query($conn, $sql)) {
        self::$successMsg = "New record created successfully";
    } else {
        self::$errorMsg = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

}




?>
