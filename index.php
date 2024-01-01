<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MonStyle.css">
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
    box-shadow: 5px 20px 50px ;
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

body, html {
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
</style>
</head>
<body>
    <?php 
    
        include('conn.php');
        include('class.php');
        $cn=new connection();
        echo Etudiant::$msg;
    ?>
    <div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide">LOG OUT</a>
    
  </div> 
</div>
   <header>
    <br>
    <img src="" alt="" id="H1li1">
    <div id="Hdiv1">
        <ul>
        <h3 class="w3-center">WELCOME</h3>
        </ul>
    </div>
    
   </header>
   <section id="BigSec" style="height: 40px">
        <section id="Sec1">
            <div class="S1div">
                <div id="S1div11">Students</div>
                <ul>
                <li><a href="AddStud.php">Add Student</li></a>
                <a href="DelStud.php"><li>Delete Student</li></a>
                <a href="ListStud.php"><li>List of Students</li></a>
                </ul>
            </div>
            <div class="S1div">
                <div id="S1div31">Administration</div>
                <ul>
                <a href="MajGroups.php"><li>Groups</li></a>
                </ul>
            </div>
        </section>

<section id="Sec3">

</section></section>
   <footer id="fotter" ><h3 class="w3-center"> MajRaj</h3></footer> 
</body>
</html>