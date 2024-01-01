<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="MonStyle.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Administrator</title>
        <style>
        body{
    background-color: rgb(63, 156, 166);
    list-style-type: none;
}
ul{
    list-style: none;
  }
  a{
    color: black;
    text-decoration: none;
    font-weight: bold;
  }
  a:hover{
    color: black;

  }
#BigSec{
    position: relative;
}
#Sec1{
    border: 4px black solid;
    display: flex;
    position: absolute;
    background-color: rgb(63, 156, 166);
    width: 15vw;
    height: 39vw;
    padding: 5px;
    margin-left: 5px;
    justify-content: center;
    flex-direction: column;
}
#fotter{
    display: flex;
    position: relative;
    background:rgb(63, 156, 166);
    padding:40px; 
    margin-top:567px;
    padding-left:600px;
   
   
}

#Sec3{
    border: 3px black solid;
    position: absolute;
    background-color: rgb(223, 228, 231);
    right: 1vw;
    width: 80vw;
    height: 39vw;
    padding-left:300px;
    padding-top:67px;
    box-shadow: 5px 20px 50px ;
            text-decoration: double;
}
#Sec3 label {
            font-size: 20px;
            text-align: center;
        }
#S1div11{
    border: 2px black solid;
    text-align: center;
    font-weight: bolder;
}
#S1div21{
    border: 2px black solid;
    text-align: center;
    font-weight: bolder;
}
#S1div31{
    border: 2px black solid;
    text-align: center;
    font-weight: bolder;
}

body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
body, html{
  height: 100%;
  line-height: 1.8;
}
/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("/w3images/mac.jpg");
  min-height: 100%;
}
.w3-bar .w3-button {
  padding: 16px;
}
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
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
        <title>Administrator</title>
    </head>
<body>
    <img src="" alt="" id="H1li1">
    <div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide">LOG OUT</a>
    
  </div> 
</div>
<br>
<br>
   <header>
    <div id="Hdiv1">
        <ul>
        <h3 class="w3-center">WELCOME</h3>
        </ul>
    </div>
   </header>
   
   <section id="BigSec">
        <section id="Sec1">
        

<div class="S1div">
    <div id="S1div11">Students</div>
    <ul>
        <li><a href="AddStud.php">Add Student</a></li>
        <li><a href="DelStud.php">Delete Student</a></li>
        <li><a href="ListStud.php">List of Students</a></li>
    </ul>
</div>
        
            <div class="S1div">
                <div id="S1div21">Administration</div>
                <ul>
                <a href="MajGroups.php"><li onclick="">Groups</li></a>
                
                </ul>
            </div>
             
        </section>
</section>

   <section id="Sec3">
   <form method="POST" action="">
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter your first name">
            <span id="fnameSpan" style="color: red;"></span>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter your last name">
            <span id="lnameSpan" style="color: red;"></span>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email">
            <span id="emailSpan" style="color: red;"></span>
        </div>
        <div class="form-group">
            <label for="phone">Phone number</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number">
            <span id="phoneSpan" style="color: red;"></span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            <span id="passSpan" style="color: red;"></span>
        </div>
        <button type="submit" class="btn btn-primary btn-block" id="addBt" mouseover="add()">Sign Up</button>
</form>
   </section>
<?php 
    include('conn.php');
    $cn=new connection();
    $cn->selectDatabase('MyPhpDb');
    include('class.php');
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $ln=$_POST['lastName'];
        $fn=$_POST['firstName'];
        $em=$_POST['email'];
        $ph=$_POST['phone'];
        $pd=$_POST['password'];
        if(!empty($ln) && !empty($fn) && !empty($em) && !empty($ph) && !empty($pd)){
        $stud=new Etudiant($ln,$fn,$em,$ph,$pd);
        if(1){
        $stud->AddStudent('Etudiant',$cn->conn);
        header("Location: index.php");
        exit();
    }
        }
        
    }
?>
<footer id="fotter" >
 
 <h3 class="w3-center"> MajRaj</h3>
</footer>
<script src="script.js"></script>
</body>
</html>