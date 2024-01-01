<?php 
class Etudiant {
    public $id;
    private $nom;
    private $prenom;
    private $email;
    private $phone;
    private $pwd;
    private $grp;
    static $msg;

    public function __construct($nom, $prenom, $email, $phone, $pwd) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->phone = $phone;
        $this->pwd = password_hash($pwd, PASSWORD_DEFAULT);
    }

    function AddStudent($tab, $con) {
        $qry = "INSERT INTO $tab (nomStud, prenomStud, emailStud, phoneStud, pdStud) VALUES ('$this->nom', '$this->prenom', '$this->email', '$this->phone', '$this->pwd')";
        if (mysqli_query($con, $qry)) {
            echo "Student added successfully";
        } else {
            echo "Student add error: " . mysqli_error($con);
        }
    }

    static function DeleteStudent($tab, $con, $a) {
        $qry = "DELETE FROM $tab WHERE IdStud = '$a'";
        if (mysqli_query($con, $qry)) {
            echo "Student $a deleted successfully";
            self::$msg="deleted";
        } else {
            echo "Error deleting student $a: " . mysqli_error($con);
            self::$msg="not deleted";
        }
    }
    static function ListStudent($tab, $con){

        $qry = "SELECT idStud, prenomStud, nomStud,emailStud, phoneStud FROM $tab";
        $result=mysqli_query($con, $qry);
        if (mysqli_num_rows($result)>0) {
            $data = [];
            while($row=mysqli_fetch_assoc($result)){
                $data[]=$row;
            }
        } 
        return $data;
    }

    static function FindStudent($tab, $con, $a){
        $qry = "SELECT idStud, prenomStud, nomStud,emailStud, phoneStud FROM $tab WHERE IdStud = '$a'";
        $result=mysqli_query($con, $qry);
        if (mysqli_num_rows($result)>0) {
            $row=mysqli_fetch_assoc($result);
        } 
        return $row;
    }

static function getStudInfoById($tab, $con, $a){
    $qry="SELECT * FROM $tab WHERE IdStud='$a'";
    $result=mysqli_query($con, $qry);
        if (mysqli_num_rows($result)>0) {
            $row=mysqli_fetch_assoc($result);
        } 
        return $row;
}
function UpdateStudent($tab, $con, $a, $b, $c, $d, $e, $f){
        $qry = "UPDATE $tab SET nomStud='$b', prenomStud='$c', emailStud='$d', phoneStud='$e', pdStud='$f' WHERE IdStud='$a'";
    if (mysqli_query($con, $qry)) {
        echo "Student updated successfully";
        self::$msg="Updated";
    } else {
        echo "Student update error: " . mysqli_error($con);
        self::$msg="Fail to update";
    }
}
}
class Fillier {
    public $filiierName;
    public static $errorMsg = "";
    public static $successMsg = "";
    public function __construct($filiierName){
        $this->filiierName = $filiierName;
    }
    public function insertToDatabasefiliier($tableName, $conn) {
        // global $connection;
        $sql = "INSERT INTO $tableName (fillezr) VALUES ('$this->filiierName')";
        // $result = mysqli_query($connection->conn, $sql);
        if (mysqli_query($conn, $sql)) {
            self::$successMsg = "New record created successfully";
        } else {
            self::$errorMsg = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    public function GetFillieres($tableName, $conn){
        $sql="SELECT idFill FROM $tableName";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Fetch the fillieres from the result set
            $fillieres = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $fillieres[] = $row['idFill'];
            }
    
            // Return the array of fillieres
            return $fillieres;
        } else {
            // Set an error message if the query fails
            self::$errorMsg = "Error Get Fill: " . $sql . "<br>" . mysqli_error($conn);
            return []; // Return an empty array or handle the error accordingly
        }
    }

        // if ($result) {
        //     // Return the ID of the inserted row
        //     return mysqli_insert_id($connection->conn);
        // } else {
        //     // Handle the error (log it, display a message, etc.)
        //     echo "Error: " . mysqli_error($connection->conn);
        //     return false;
        // }
    }


class Annes {
    public $annesName;

    public static $errorMsg = "";

    public static $successMsg="";
    public function __construct($annesName) {
        $this->annesName = $annesName;
    }

    public function insertToDatabaseannes($tableName, $conn) {
        global $connection;
        $sql = "INSERT INTO $tableName(year) VALUES ('$this->annesName')";
        if (mysqli_query($conn, $sql)) {
            self::$successMsg = "New record created successfully";
        } else {
            self::$errorMsg = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        // if ($result) {
        //     // Return the ID of the inserted row
        //     return mysqli_insert_id($connection->conn);
        // } else {
        //     // Handle the error (log it, display a message, etc.)
        //     echo "Error: " . mysqli_error($connection->conn);
        //     return false;
        // }
    }
    public function GetAnnees($tableName, $conn){
        $sql="SELECT idAnn FROM $tableName";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Fetch the fillieres from the result set
            $fillieres = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $Anns[] = $row['idAnn'];
            }
    
            // Return the array of fillieres
            return $Anns;
        } else {
            // Set an error message if the query fails
            self::$errorMsg = "Error Get Annee: " . $sql . "<br>" . mysqli_error($conn);
            return []; // Return an empty array or handle the error accordingly
        }
    }
}

class Group {
    public $groupName;
    public   $filierInstance;
    public   $anneeInstance;
    static $mm;
    public function __construct($grouName, $anneInstance, $filieInstance) {
        $this->groupName = $grouName;
        $this->filierInstance= $filieInstance;
        $this->anneeInstance= $anneInstance;
    }
    public function insertToDatabase($tableName, $conn,$s,$g) {
            $sql = "INSERT INTO $tableName (Grp) VALUES ('$g') WHERE id=$s";
            $result = mysqli_query( $conn, $sql);

            if (!$result) {
                // Handle the error (log it, display a message, etc.)
                echo "Error: " . mysqli_error($conn);
                return false;
            }
         else {
            // Handle the case where Fillier or Annes save fails
            echo "Error: Unable to save Fillier or Annes.";
            return false;
        }
        return mysqli_insert_id($conn);

    }
    public function getNumberOfStudents($conn) {
        $group_name = mysqli_real_escape_string($conn, $this->groupName);
        $sql = "SELECT COUNT(*) as count FROM students WHERE group_id IN (SELECT id FROM groups WHERE name = '$group_name')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['count'];
        } else {
            // Handle the error (log it, display a message, etc.)
            echo "Error: " . mysqli_error($conn);
            return 0;
        }
    }
    public function GetGrp($tableName, $conn){
        $sql="SELECT idGrp FROM $tableName";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Fetch the fillieres from the result set
            $grps = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $grps[] = $row['idGrp'];
            }
    
            // Return the array of fillieres
            return $grps;
        } else {
            // Set an error message if the query fails
            self::$errorMsg = "Error Get grp: " . $sql . "<br>" . mysqli_error($conn);
            return []; // Return an empty array or handle the error accordingly
        }
    }
    public function GrpInsert($tab, $con, $s, $gr){
        $qry = "INSERT INTO $tab (Grp) VALUES ('$gr') WHERE IdStud='$s'";
        if (mysqli_query($con, $qry)) {
            echo "Student added successfully";
        } else {
            echo "Student add error: " . mysqli_error($con);
        }
        
    }
}


?>