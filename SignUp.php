
<?php



// Include connection file
include('conn.php');

// Create an instance of the Connection class
$connection = new Connection();

// Select the database
$connection->selectDatabase('MyPhpDb');

$CIN = "";
$firstname = "";
$lastname = "";
$email = "";
$phonenumber = "";
$password = "";
$euroormsg = "";
$succesmsg = "";
$showSignUp = true;

if (isset($_POST['submit'])) {
    $showSignUp = true;
    $CIN = $_POST['CIN'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenamber'];
    $password = $_POST['pasword'];

    if (empty($CIN) || empty($firstname) || empty($lastname) || empty($email) || empty($phonenumber) || empty($password)) {
        $euroormsg = "All fields are required";
    } elseif (strlen($password) < 8) {
        $euroormsg = "The password must contain at least 8 characters";
    } elseif (preg_match('/[A-Z]/', $password) == 0) {
        $euroormsg = "The password must contain at least one capital letter";
    } else {
        include('tabClient.php');
        $client = new Client($firstname, $lastname, $email, $password, $phonenumber, $CIN);
        $client->insertClient('our_Clients', $connection->conn);
        $successMesage = Client::$successMsg;
        $errorMesage = Client::$errorMsg;
        $emailValue = "";
        $lnameValue = "";
        $fnameValue = "";
        
        
    }


}
// if(isset($_POST['submitee'])) {

    // $showSignUp = false;
    // $sql = "SELECT email, password FROM our_Clients ORDER BY id DESC LIMIT 1";
    // $result = mysqli_query($connection->conn, $sql);
    // $verifypassword = "";
    // $signInError=" ";
    // if ($result && mysqli_num_rows($result) > 0) {
    //     $row = mysqli_fetch_assoc($result);
    //     $storedEmail = $row['email'];
    //     $storedPassword = $row['pasword'];
    //     // Check if the entered email matches the stored email
    //      $emaiilverify=$_POST['emaile'] ;
    //     if ( $emaiilverify==$storedEmail) {
    //         // Check if the entered password matches the stored hashed password
    //         $pppaseverify= $_POST['ppasss'];
    //         if (password_verify($pppaseverify, $storedPassword)) {
    //             // Passwords match, user is authenticated
    //             $verifypassword=$storedPassword;
    //         } else {
    //             // Passwords do not match
    //             $signInError = 'Incorrect password';
    //         }
    //     } else {
    //         // Email not found in the database
    //         $signInError = 'Email not found';
    //     }
    

    
    // $result = mysqli_query($connection->conn, $sql);
    // if ($result && mysqli_num_rows($result) > 0) {
    //     $row = mysqli_fetch_assoc($result);
    //     $emailValue = $row['email'];
    //     // Note: It's not recommended to display or manipulate passwords directly.
    //     // This is just an example for demonstration purposes.
    //     $passwordValue = $row['password'];
    // }
?>

<!DOCTYPE html>
<html>
<head>
    <!-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> -->
    <title> login </title>
    <style>
     body {
    background-color:rgb(255,255,255) ;
            text-align: center;
         display: flex;
         justify-content: center;
         align-items: center;
  background-repeat: no-repeat; 
  background-size: cover;
  justify-content: center;
  height: 899px;

		}
        form { 
            box-shadow: 5px 20px 50px ;
            /* background-color:rgb(4, 9, 45) ; */
			max-width: 400px;
			padding: 100px;
            padding-top: 56px;
            /* Margin-top :  px; */
            Margin-left : 40px;
            width: 77%; 
            border-radius: 5px;
            text-decoration: double;
            overflow: hidden;
            height: 800px;
            /* font-size: 36px;  */
		
		}
        form h1 {
            font-size: 80px;
            text-align: center;
        }
        form h2{
            font-size: 80px;
            text-align: center; 
        }
        /* label{
            transition: .5s ease-in-out;
        } */
input[type="submit"] {
             background-color: #626267;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			margin-left: 30px;
            /* margin-right: 20px; */
             margin-right: 30px; 
            width: 233px;
            position: relative;
		}
		input[type="submit"]:hover {
			background-color: #270d86;
		}
        /* input[type="reset"] {
             background-color: #626267;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			margin-left: 30px;
            /* margin-right: 20px; */
             /* margin-right: 30px; 
            width: 233px;
            position: relative;
		}
		input[type="reset"]:hover {
			background-color: #270d86;
		} */ 
      
        input[type="checkbox"] {
			background-color: #29234e;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			/* margin-left: 20px; */
		}
		input[type="checkbox"]:hover {
			background-color: #270d86;
		}
        input[type="email"] {
			background-color: #626267;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			margin-left: 20px;
            /* margin-right: 20px; */
            width: 200px;
		}
      
		input[type="email"]:hover {
			background-color: #423a60;
		}
        input[type="password"] {
            background-color: #626267;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			margin-left: 20px;
            width: 200px;
        }
      input[type="password"]:hover{
            background-color: #423a60;
        }
        /* .signin-form {
            display: ;
        }

        .signup-form {
            display: ;
        } */
   .frogetme{
    display: flex;
    justify-content: space-between;
    font-size: 14.5px;
    margin: -10px 22 10px;
   }
   .frogetme label input{
    margin-left: 69px;
   }
   .frogetme a{
    margin-right: 69px;
    text-decoration: none;
   }
   .frogetme a:hover{
    text-decoration: underline;
   }
   input[type="number"] {
			background-color: #626267;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			margin-left: 20px;
            /* margin-right: 20px; */
            width: 200px;
		}
      
		input[type="number"]:hover {
			background-color: #423a60;
		}
        input[type="text"] {
			background-color: #626267;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			margin-left: 20px;
            /* margin-right: 20px; */
            width: 200px;
		}
      
		input[type="text"]:hover {
			background-color: #423a60;
		}

        span {
            /* background-color: #423a60; */
            text-align: center;
            display: block;
            margin-top: 5px;
            padding: 5px;
        }
        button{
            background-color: #626267;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			margin-left: 20px;
        }
    </style>
</head>

<body>
 <?php if($showSignUp==true) { ?> 
    <form method="POST" action="" class="signup-form">
        <h1>Sign up </h1>
        <?php if(!empty($succesmsg)){
        echo "
       <span id='s0' name='s0'>$succesmsg</span> ";
       }?>
        <br><br>
        <label for="gmailE"></label>
        <input type="email" name="email" placeholder="email" value=" "  >
       
        
        <br><br>
        <label for="CINE"></label>
        <input type="text" placeholder="CIN" required name="CIN">
       
        <br><br>
        <label for="Phone namberE"></label>
        <input type="text" placeholder="Phone namber" name="phonenamber" required>
        
       <br><br>
       <label for="prenomE"></label>
       <input type="text" placeholder="prenom" name="lastname" required>
       <br><br>
       <label for="nomeE"></label>
       <input type="text"  placeholder="nome" 
       name="firstname"required>
       
        <br><br>
        <label for="passwordE"></label>
        
        <input type="password"  placeholder="paswoord" 
       name="pasword" autocomplete="off" required>

        <?php if(!empty($euroormsg)){
        echo "
        <span id='s1' name='s1'><strong>$euroormsg</strong></span> ";
       }?>
        <br><br>
        <input name="submit" type="submit" value="creat a compte ">
        <br><br>

    </form>
   
        <div>
        <form method="POST" action="" class="signin-form">
        <h2>Sign In</h2>
        <label for="signinEmail">Email:</label>
        <input type="email" name="emaile" value="" required>
        <br><br>
        <?php if(!empty($signInError)){
        echo "
        <span id='s23' name='s24'><strong>$signInError</strong></span> ";
       }?>
        <label for="signinPassword">Password:</label>
        <input type="password" value=""  name="ppasss" required>
        <br><br>
        <?php if(!empty($signInError)){
        echo "
        <span id='s24' name='s24'><strong>$signInError</strong></span> ";
       }?>
       <br><br>
       <input  type="submit" name="submite" value="Sign In">
       <br><br>
       <button id=" buton1"onclick="redirectToPage1()" name="submite">connected</button> 
    </form>
    </div>
        <!-- <?php } ?> -->
        <script>
        function redirectToPage() {
            // Change the URL to the desired page
            window.location.href = "signin.php";
        }
        function redirectToPage1() {
            // Change the URL to the desired page
            window.location.href = "index.php";
        }

    </script>
</body>

</html>
