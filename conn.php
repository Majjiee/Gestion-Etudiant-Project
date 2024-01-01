<?php
   class Connection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";  
    public $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);
        // Check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    function createDatabase($MyDataBase) {
        $sql = "CREATE DATABASE $MyDataBase";
        if (mysqli_query($this->conn, $sql)) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . mysqli_error($this->conn);
        }
    }

    function selectDatabase($MyDataBase) {
        mysqli_select_db($this->conn, $MyDataBase);
    }

    function createTable($query) {
        if (mysqli_query($this->conn, $query)) {
            echo "Table created successfully";
        } else {
            echo "Error creating table: " . mysqli_error($this->conn);
        }
    }
}
    // $conn->createDatabase('MyPhpDb');
    // $conn->selectDatabase('MyPhpDb');
    // $query="CREATE TABLE users (
    //     Id int(6) PRIMARY KEY AUTO_INCREMENT,
    //     nom varchar(10),
    //     prenom varchar(10),
    //     email varchar(30),
    //     Active varchar(6)
    // )";
    // $conn->createTable($query);
    // $query="CREATE TABLE Etudiant (
    //     IdStud int(6) PRIMARY KEY AUTO_INCREMENT,
    //     nomStud varchar(10),
    //     prenomStud varchar(10),
    //     emailStud varchar(30),
    //     phoneStud varchar(10),
    //     pdStud varchar(6),
    //     ActiveStud varchar(6)
    // )";
    // $conn->createTable($query);
    // $query="CREATE TABLE Professeur (
    //     IdProf int(6) PRIMARY KEY AUTO_INCREMENT,
    //     nomProf varchar(10),
    //     prenomProf varchar(10),
    //     emailProf varchar(30),
    //     phoneProf varchar(10),
    //     pdProf varchar(6),
    //     ActiveProf varchar(6)
    // )";
    // $conn->createTable($query);
    // $query="CREATE TABLE Administrateur (
    //     IdAd int(6) PRIMARY KEY AUTO_INCREMENT,
    //     nomAd varchar(10),
    //     prenomAd varchar(10),
    //     emailAd varchar(30),
    //     phoneAd varchar(10),
    //     pdAd varchar(6),
    //     ActiveAd varchar(6)
    // )";
    // $conn->createTable($query);
    // $query="CREATE TABLE Grp (
    //     IdGrp int(6) PRIMARY KEY AUTO_INCREMENT,
    //     nomGrp varchar(10)
    // )";
    // $conn->createTable($query);

?>
