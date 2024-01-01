
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
$lastAddedEmail ="";
       $$email="";
       $password="";
if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($connection->conn, $_POST['emaile']);
    $password = mysqli_real_escape_string($connection->conn, $_POST['ppasss']);
    $sql = "SELECT email, password FROM our_Clients WHERE email='$email' AND password='$password';";
    $result = mysqli_query($connection->conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (is_array($row) && !empty($row)) {
        if ($email === 'admin@gmail.com' && $password === 'admin') {
            echo '<button id="buton1"  name="submit" onclick="redirectToPage();">Sign In</button>
            ';
        } else {
            // Your code for successful login for regular users goes here
        }
    } else {
        // Your code for unsuccessful login goes here
    }
} 
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
        #aa { 
            box-shadow: 5px 20px 50px #423a60;
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
        #aa h1 {
            font-size: 80px;
            text-align: center;
        }
        #aa h2{
            font-size: 80px;
            text-align: center; 
        }
        
#az {
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
		#az :hover {
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
        .signin-form {
            display: <?php echo ($showSignUp==false) ? 'block' : 'block'; ?>;
        }

        .signup-form {
            display: <?php echo ($showSignUp) ? 'block' : 'block'; ?>;
        }
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
   /* input[type="number"] {
			background-color: #626267;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			margin-left: 20px;
            /* margin-right: 20px; */
            /* width: 200px;
		} */ 
      
		/* input[type="number"]:hover {
			background-color: #423a60;
		} */
        /* input[type="text"] {
			background-color: #626267;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			margin-left: 20px;
            /* margin-right: 20px; */
            /* width: 200px;
		} */ 
      
        button{
            background-color: #626267;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			margin-left: 20px;
        }

        span {
            /* background-color: #423a60; */
            text-align: center;
            display: block;
            margin-top: 5px;
            padding: 5px;
        }
    </style>
</head> 

<body>
<form id="aa" method="POST" action="" class="signin-form">
        <h2>Sign In</h2>
        <label for="signinEmail">Email:</label>
        <input type="email" name="emaile" value="" required>
        <br><br>
        <label for="signinPassword">Password:</label>
        <input type="password" value=""  name="ppasss" required>
        <br><br>
       <br><br>
<button id=" buton1"onclick="redirectToPage1()" name="submite">sing up</button>
<br><br>
<button id=" buton1"onclick="redirectToPage()" name="submite">connected</button> 

<br><br>

</form>
       
      
 <script>
        // JavaScript function to redirect to another 
        function redirectToPage1() {
            // Change the URL to the desired page
            window.location.href = "Sign Up.php";
        }
        function redirectToPage() {
            // Change the URL to the desired page
            window.location.href = "index.php";
        }
    </script>
</body>

</html>
